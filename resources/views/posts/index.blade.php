<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Posts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background:lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Started Laravel</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{route('posts.create')}}" class="btn btn-md btn-success mb-3">Tambah Data</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($posts as $post)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{asset('/storage/posts/'.$post->image)}}" alt="" class="rounded" style="width:150px">
                                    </td>
                                    <td>{{$post->title}}</td>
                                    <td>{{!! $post->content}}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda yakin?');" action="{{route('posts.destroy', $post->id)}}" method="POST">
                                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-sm btn-dark">show</a>
                                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-primary">edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data Post belum tersedia
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(session()->has('success'))
        toastr.success('{{session('success')}}', 'Berhasil');

        @elseif(session()->has('error'))
        toastr.error('{{session('error')}}', 'Gagal!');

        @endif
    </script>
</body>
</html>