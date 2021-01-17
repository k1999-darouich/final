@extends('layouts.app')

@section('content')
<div class="container-fluid" style="overflow-x: hidden">
    <div class="row posts" style="height: 100%;">
        <div class="col-md-2 posts-left">
            <div class="row">
                <div class="col-md-12 col-6 mb-2">
                    <i class="fas fa-sliders-h"></i> Filtre <br>
                    <hr color="white" style="font-size: xx-small;">
                    <div class=" bg-white p-2 search">
                        <div class="row">
                            <form action="search" enctype="multipart/form-data" method="POST" class="pt-3 pb-3 col-12">
                                <button type="submit" name="today" value="today" class="btn btn-info" style="width: 100%; font-size: 80%;">Aujourd'hui</button>
                                @csrf
                            </form>
                            <form action="search" enctype="multipart/form-data" method="POST" class=" col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group col-12 ">
                                            <select class="form-control" name="categorie" id="categorie">
                                                <option value="" disabled selected>catégorie</option>
                                                @foreach ($categories as $categorie)
                                                <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <select class="form-control mt-3 " name="type" id="type">
                                                <option value="" disabled selected>Type</option>
                                                @foreach ($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-info"> <i class="fas fa-search" style="font-size: large;color: white; "></i></button>

                                    </div>

                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 col-6" >
                    <i class="fas fa-users"></i> utilisateurs <br>
                    <hr color="white">
                    <div class="scroll-bar-wrap">
                        <div class="scroll-box">
                        @if(Auth::check())
                    <div class="users-status">
                        @foreach(App\user::all() as $utilisateur)
                        @if($utilisateur->isOnline())
                        <div class="d-flex ">
                            <div class="align-items-top mr-1">
                                @if($utilisateur->profile->image )
                                <img src="/storage/{{ $utilisateur->profile->image }}" class="rounded-circle" style="max-width:30px; border: 3px solid #007399; ">
                                @else
                                <img src="/images/default-profile-picture1.jpg" class="rounded-circle" style="max-width:30px; border: 3px solid #007399; ">
                                @endif
                            </div>
                            <div>
                                <div class="user-status">{{$utilisateur->profile->pseudo_name}}</div> <br>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @foreach(App\user::all() as $utilisateur)
                        @if(!$utilisateur->isOnline())
                        <div class="d-flex ">
                            <div class="align-items-top mr-1">
                                @if($utilisateur->profile->image )
                                <img src="/storage/{{ $utilisateur->profile->image }}" class="rounded-circle" style="max-width:30px; border: 3px solid grey; ">
                                @else
                                <img src="/images/default-profile-picture1.jpg" class="rounded-circle" style="max-width:30px; border: 3px solid grey; ">
                                @endif

                            </div>
                            <div>
                                <div class="user-status">{{$utilisateur->profile->pseudo_name}}</div> <br>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endif
                        </div>
                        <div class="cover-bar"></div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-10 posts-right p-5 " style="min-height: 70vh;">
            @if($posts->count()===0 and ( !@isset($search_posts) or $search_posts->count()===0) )
            <div class="first-user mt-3 " style="text-align: center;">

                <img src="/images/welcome.jpg" style="width: 70%;">
                <div>
                    <a href="/p/create" class="first-event"><i class="far fa-calendar-plus"></i> Créer le premier Evènement </a>
                </div>
            </div>
            @else
            @if(@isset($search_posts))
            @if($search_posts->count()===0)
            <div style="text-align: center;">
                <h1 style="color: #e6e6e6;"><i class="fas fa-exclamation-triangle"></i> Aucun Résultat</h1>
            </div>
            @endif
            @foreach ($search_posts as $post)
            <div class="row">
                <div class="col-12" id="{{ $post->id }}">

                    <div class="d-flex align-items-center ">
                        <div>
                            @if($post->user->profile->image )
                            <img src="/storage/{{ $post->user->profile->image }}" class="rounded-circle" style="max-width:60px;">
                            @else
                            <img src="/images/default-profile-picture1.jpg" class="rounded-circle" style="max-width:60px;">
                            @endif


                        </div>
                        <div class="pl-2 pt-1">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark"><b>{{ $post->user->username }}</b> </span>
                            </a>
                            <p><small class="text-muted">publié le : {{ $post->created_at->format('d/M/Y - G:i') }}</small></p>
                        </div>
                    </div>

                </div>
                <div class="row mt-2">
                    <div class="col-md-4 post-img">
                        <img src="/storage/{{  $post->image }}" width="100%">
                    </div>
                    <div class="col-md-8 pt-2">
                        <a href="/p/{{ $post->id }}" class="h4">{{$post->intitule}}</a>
                        <h6>{{$post->caption}}</h6>
                        <p>Date : {{ date('d/M/Y - G:i',strtotime($post->du)) }} <b>/</b>
                            {{ date('d/M/Y - G:i',strtotime($post->au)) }}
                        </p>
                        <p><i class="fas fa-bookmark mr-1" style="color:#007399 ;"></i>&#160;{{ $post->categorie->name }} - {{ $post->type->name }}</p>
                        <p> <a href="/p/{{ $post->id }}" style="color:#007399 ;"><i class="far fa-calendar-check" style="color: #007399;"></i>&#160;Découvrir</a>
                        </p>
                        <hr>
                        <p><small class="text-muted font-weight-normal">{{ $post->comments->count()}} <i class="fas fa-comment-alt"></i></small></p>
                        <div class=" comment-bloc">
                            <div class="scroll-bar-wrap">
                                <div class="scroll-box">
                                    @foreach ($post->comments as $comment)
                                    <div class="d-flex  mb-1">
                                        <div class="align-items-top">
                                            @if($comment->user->profile->image )
                                            <img src="/storage/{{$comment->user->profile->image }}" class="rounded-circle" style="max-width:30px; ">
                                            @else
                                            <img src="/images/default-profile-picture1.jpg" class="rounded-circle" style="max-width:30px; ">
                                            @endif
                                        </div>
                                        <div class="ml-2 p-2 comment">
                                            <a href="/profile/{{ $comment->user->id }}">
                                                <span class="text-dark"><small><b>{{ $comment->user->username }} </b></small></span>
                                            </a>
                                            <span class="font-weight-lighter text-muted"><small>{{ $comment->created_at->format('d/M/Y - G:i') }}</small></span>
                                            <p class="comment-text"><small> {{ $comment->comment }}</small></p>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                                <div class="cover-bar"></div>
                            </div>

                        </div>
                        <div class="mt-2 ">
                            <form action='{{ route("comment.store", ["id" => $post->id]) }}' class="box row emoji-picker-container" method="post">
                                @csrf
                                {{ method_field('POST') }}

                                <div class=" col-1 pt-3">
                                    @if($post->user->profile->image )
                                    <img src="/storage/{{ $post->user->profile->image }}" class="rounded-circle" style="max-width:30px;">
                                    @else
                                    <img src="/images/default-profile-picture1.jpg" class="rounded-circle" style="max-width:30px;">
                                    @endif
                                </div>
                                <div class=" col-9 input-box">
                                    <input id="comment" type="comment" class=" @error('comment') is-invalid @enderror" name="comment" value="{{ old('comment')}}" data-emoji-input="unicode" data-emojiable="true" autocomplete="comment" required>

                                    @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="comment" class="ml-2">Ecrivez un commentaire...</label>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-info mt-2"> <i class="fas fa-plus"></i> </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
            @else
            @foreach ($posts as $post)
            <div class="row" id="{{ $post->id }}">
                <div class="col-12">

                    <div class="d-flex align-items-center ">
                        <div>
                            @if($post->user->profile->image )
                            <img src="/storage/{{ $post->user->profile->image }}" class="rounded-circle" style="max-width:60px;">
                            @else
                            <img src="/images/default-profile-picture1.jpg" class="rounded-circle" style="max-width:60px;">
                            @endif
                        </div>
                        <div class="pl-2 pt-1">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark"><b>{{ $post->user->profile->pseudo_name }}</b> </span>
                            </a>
                            <p><small class="text-muted">publié le : {{ $post->created_at->format('d/M/Y - G:i') }}</small></p>
                        </div>
                    </div>

                </div>
                <div class="row mt-2">
                    <div class="col-md-4 post-img">
                        <img src="/storage/{{  $post->image }}" width="100%">
                    </div>
                    <div class="col-md-8 pt-2">
                        <a href="/p/{{ $post->id }}" class="h4">{{$post->intitule}}</a>
                        <h6>{{$post->caption}}</h6>
                        <p>Date : {{ date('d/M/Y - G:i',strtotime($post->du)) }} <b>/</b>
                            {{ date('d/M/Y - G:i',strtotime($post->au)) }}
                        </p>
                        <p><i class="fas fa-bookmark mr-1" style="color:#007399 ;"></i>&#160;{{ $post->categorie->name }} - {{ $post->type->name }}</p>
                        <p> <a href="/p/{{ $post->id }}" style="color:#007399 ;"><i class="far fa-calendar-check" style="color: #007399;"></i>&#160;Découvrir</a>
                        </p>
                        <hr>
                        <p><small class="text-muted font-weight-normal">{{ $post->comments->count()}} <i class="fas fa-comment-alt"></i></small></p>
                        <div class=" comment-bloc">
                            <div class="scroll-bar-wrap">
                                <div class="scroll-box">
                                    @foreach ($post->comments as $comment)
                                    <div class="d-flex  mb-1">
                                        <div class="align-items-top">
                                            @if($comment->user->profile->image )
                                            <img src="/storage/{{$comment->user->profile->image }}" class="rounded-circle" style="max-width:30px; ">
                                            @else
                                            <img src="/images/default-profile-picture1.jpg" class="rounded-circle" style="max-width:30px; ">
                                            @endif
                                        </div>
                                        <div class="ml-2 p-2 comment">
                                            <a href="/profile/{{ $comment->user->id }}">
                                                <span class="text-dark"><small><b>{{ $comment->user->profile->pseudo_name }} </b></small></span>
                                            </a>
                                            <span class="font-weight-lighter text-muted"><small>{{ $comment->created_at->format('d/M/Y - G:i') }}</small></span>
                                            <p class="comment-text"><small> {{ $comment->comment }}</small></p>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                                <div class="cover-bar"></div>
                            </div>

                        </div>
                        <div class="mt-2 ">
                            <form action='{{ route("comment.store", ["id" => $post->id]) }}' class="box row emoji-picker-container" method="POST">
                                @csrf
                                {{ method_field('POST') }}

                                <div class=" col-1 pt-3">
                                    @if($post->user->profile->image )
                                    <img src="/storage/{{ $post->user->profile->image }}" class="rounded-circle" style="max-width:30px;">
                                    @else
                                    <img src="/images/default-profile-picture1.jpg" class="rounded-circle" style="max-width:30px;">
                                    @endif
                                </div>
                                <div class=" col-9 input-box">
                                    <input id="comment" type="comment" class=" @error('comment') is-invalid @enderror" name="comment" value="{{ old('comment')}}" data-emoji-input="unicode" data-emojiable="true" autocomplete="comment" required>

                                    @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="comment" class="ml-2">Ecrivez un commentaire...</label>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-info mt-2"> <i class="fas fa-plus"></i> </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
            @endif


            @endif
        </div>


    </div>

</div>





@endsection