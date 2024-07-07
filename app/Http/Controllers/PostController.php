<?php

namespace App\Http\Controllers;

use App\Enum\NotifyStatus;
use App\Http\Requests\PostRequest;
use App\Repository\Post\PostRepositoryInterface;
use App\Services\Post\PostServiceInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $repository;
    protected $service;


    public function __construct(
        PostRepositoryInterface $repository,
        PostServiceInterface $service
    ) {

        $this->repository = $repository;
        $this->service = $service;
    }


    public function index()
    {
        $posts = $this->repository->show();

        foreach ($posts as $key => $value) {
            $images = explode(',', $value->image);
            $posts[$key]->images = $images;
        }

        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = NotifyStatus::asSelectArray();
        return view('blog.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        $response = $this->service->store($request);
        if (!$response) {

            return back()->with('error', 'Thêm Bài Viết Thất Bại!');
        }
        return redirect()->route('post.index')->with('success', 'Thêm Bài Viết Thành Công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $result = $this->repository->delete($id);
        if (!$result) {

            return back()->with('error', 'Xoá Bài Viết Thất Bại');
        }
        return back()->with('success', 'Xoá Bài Viết thành công');
    }
}
