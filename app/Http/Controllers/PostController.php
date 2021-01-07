<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Repository\ImageRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Exception;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use App\Repository\PostRepositoryInterface;

class PostController extends Controller
{
    /**
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * @var ImageRepositoryInterface
     */
    private $imageRepository;

    /**
     * PostController constructor.
     * @param UserRepositoryInterface $userRepository
     * @param PostRepositoryInterface $postRepository
     * @param ImageRepositoryInterface $imageRepository
     */
    public function __construct(UserRepositoryInterface $userRepository, PostRepositoryInterface $postRepository, ImageRepositoryInterface $imageRepository)
    {
        parent::__construct($userRepository);

        $this->postRepository = $postRepository;

        $this->imageRepository = $imageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $posts = $this->postRepository->with(['user', 'image'])->get();

        $favourite_posts = $this->user->getFavourites('favourite_posts');

        return Inertia::render('Posts/Index', [
            'posts' => $posts,
            'favourite_posts' => $favourite_posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostRequest  $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request): RedirectResponse
    {
        $post = $this->postRepository->createPost($this->user, $request);

        $this->imageRepository->createImage($post, 'posts', $request);

        return redirect()->back();
    }

    /**
     * @param $id
     */
    public function show($id)
    {

    }

    /**
     * @param $id
     * @return Response
     */
    public function edit($id): Response
    {
        $post = $this->postRepository->find($id);

        return Inertia::render('Posts/Update', [
            'post' => $post
        ]);
    }

    /**
     * @param PostRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(PostRequest $request, $id): RedirectResponse
    {
//        $post->update($request->validated());

        return redirect()->back();
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id): RedirectResponse
    {
        $this->postRepository->find($id)->delete();

        return back(303);
    }
}
