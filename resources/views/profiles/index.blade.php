@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row profile">
        <div class="col-md-4 col-sm-12 profile-left" style="padding-left: 2rem; ">
            <div class="col-md-12 col-sm-12  " style="width: auto;">
                
                <div class="row">
                    <div class="col-md-12 col-6 img1">
                        @if($user->profile->image )
                        <img src="/storage/{{ $user->profile->image }}" class="rounded-circle">
                        @else
                        <img src="/images/default-profile-picture1.jpg" class="rounded-circle">
                        @endif

                    </div>
                    <div class="col-md-12 col-6 pt-3 profile-inf ">
                        <div class="profile-name">{{ $user->profile->pseudo_name }}</div>
                        
                        @if($user->profile->profession)
                        <div>{{$user->profile->profession->name}}</div>
                        <div class="pt-1" style="text-align: center;">
                            <div class="row " >
                                <div class="social-media col-1 ">
                                <a href="{{$user->profile->facebook_url}}" ><i class="fab fa-facebook-f" style="font-size: large;"></i></a>
                                </div>
                                <div class="col-1">
                                <a href="{{$user->profile->instagram_url}}"><i class="fab fa-instagram" style="font-size: large;"></i></a>
                                </div>
                                <div class="col-1">
                                <a href="{{$user->profile->gmail_url}}"><i class="fab fa-google" style="font-size: large;"></i></a>
                                </div>
                            </div> 
                            
                        </div>
                        @endif
                     

                    </div>
                </div>
                <hr color="white">
                <div class="col-md-12 col-sm-12 bloc-active">
                    <i class="far fa-calendar-alt" style="font-size: large;"></i>
                    <a href="#">EVENEMENTS</a>
                </div>
                @can('update', $user->profile)
                <div class="col-md-12 col-sm-12 bloc">
                    <div class=" dropdown edit-dropdown">
                    <a id="navbarDropdown" href="/profile/{{ $user->id }}/edit" class="nav-link " href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #fff;">
                        <i class="fas fa-cogs " style="font-size: large;"></i> PARAMETRES<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/profile/{{ $user->id }}/edit"
                                       >
                                        Modifier Profile
                                    </a>
                                    <a class="dropdown-item" href="/profile/{{ $user->id }}/editUser"
                                       >
                                       Changer mot de passe
                                    </a>
                                    

                                   
                                </div></div>
                </div>
                

                <div class="col-md-12 col-sm-12 bloc">
                <i class="fas fa-sign-out-alt" style="font-size: large;"></i>
                    
                    <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('DECONNEXION') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </div>
                @endcan

            </div>

        </div>
        <div class="col-md-8 col-sm-12 profile-right" style="height: 100%;">
            <div class="row">
            <div class=" col-12 heading1">Liste des événements<hr color="#007399"></div>
            </div>
            <div class="row event-card ">
                @foreach($user->posts as $post)
                <div class="col-md-6 col-lg-6 column">
                    <div class="container h-100 ">
                        <div class=" align-middle">
                        <div class="text-muted">{{ $post->updated_at }}</div>
                            <div class="card gr-1 " style=" background-image: url('/storage/{{ $post->image }}')">
                                <div class="txt">
                                    <h1>{{ $post->intitule }}</h1>
                                    <p>{{ $post->caption }}</p>
                                </div>
                                <a href="/p/{{ $post->id }}">more</a>
                                <div class="ico-card">
                                    <i class="fa fa-rebel"></i>
                                </div>
                                <div class="ml-4 mt-1 " style="text-align: end; margin-bottom: -5%;">
                                <form action="/p/{{ $post->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-info mt-3" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash" style="font-size: large;color: white; margin-left: -100%;"></i></button>
                                </form>
                               </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </div>
    @endsection
