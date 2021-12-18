<?php

namespace App\Controller;

use App\Service\Serializer;
use SpotifyWebAPI\SpotifyWebAPI;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class ReleasesController extends AbstractController
{
    /**
     * @Route("/", name="index")
     *
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return $this->redirectToRoute('releases');
    }

    /**
     * @Route("/releases", name="releases")
     *
     * @param SpotifyWebAPI $spotifyWebAPI
     * @param Serializer $serializer
     * @return Response
     */
    public function releases(SpotifyWebAPI $spotifyWebAPI, Serializer $serializer): Response
    {
        /* We request new releases to the spotify api. */
        $data = $spotifyWebAPI->getNewReleases([
            'country'   => 'CO',
            'limit'     => 20,
        ]);

        $releases = $serializer->serializeNewReleases($data->albums);

        return $this->render('releases/new_releases_list.html.twig', [
            'releases' => $releases,
            'quantity_albums' => in_array('album', array_column($releases->items, 'album_type')),
            'quantity_singles' => in_array('single', array_column($releases->items, 'album_type')),
        ]);
    }

    /**
     * @Route("/artist/{id}", name="artist")
     *
     * @param SpotifyWebAPI $spotifyWebAPI
     * @param Serializer $serializer
     * @param $id
     * @return Response
     */
    public function artist(SpotifyWebAPI $spotifyWebAPI, Serializer $serializer, $id): Response
    {
        $dataArtist = $spotifyWebAPI->getArtist($id);
        $artist = $serializer->serializeArtist($dataArtist);

        $dataArtistTopTrack = $spotifyWebAPI->getArtistTopTracks($id, [ 'country' => 'CO' ]);
        $artistTopTrack = $serializer->serializeArtistTopTrack($dataArtistTopTrack);

        return $this->render('releases/artist.html.twig', [
            'artist' => $artist,
            'artistTopTrack' => $artistTopTrack,
        ]);
    }
}