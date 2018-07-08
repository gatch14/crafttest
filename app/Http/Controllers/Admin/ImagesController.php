<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Http\Requests\Admin\Image\IndexImage;
use App\Http\Requests\Admin\Image\StoreImage;
use App\Http\Requests\Admin\Image\UpdateImage;
use App\Http\Requests\Admin\Image\DestroyImage;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Image;

class ImagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexImage $request
     * @return Response|array
     */
    public function index(IndexImage $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Image::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'path'],

            // set columns to searchIn
            ['id', 'path']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.image.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin.image.create');

        return view('admin.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreImage $request
     * @return Response|array
     */
    public function store(StoreImage $request)
    {
        // Sanitize input
        //$sanitized = $request->validated();

        // Store the Image
        //$image = Image::create($sanitized);
$post = Image::create($request->validated());
        //if ($request->ajax()) {
        //    return ['redirect' => url('admin/images'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
       // }
        dd($request);

        //dd($request->file('gallery'));

       //return redirect('admin/images');
    }

    /**
     * Display the specified resource.
     *
     * @param  Image $image
     * @return Response
     */
    public function show(Image $image)
    {
        $this->authorize('admin.image.show', $image);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Image $image
     * @return Response
     */
    public function edit(Image $image)
    {
        $this->authorize('admin.image.edit', $image);

        return view('admin.image.edit', [
            'image' => $image,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateImage $request
     * @param  Image $image
     * @return Response|array
     */
    public function update(UpdateImage $request, Image $image)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Image
        $image->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/images'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/images');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyImage $request
     * @param  Image $image
     * @return Response|bool
     */
    public function destroy(DestroyImage $request, Image $image)
    {
        $image->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }
}
