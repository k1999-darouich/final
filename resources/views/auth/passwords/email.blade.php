@extends('layouts.app')

@section('content')
<div class="container col-8  bg-white" style="margin-top: 5rem; box-shadow: -5px -5px 5px rgba(0, 0, 0, 0.5);">
    
             <div class="box2 p-4 offset-1 col-10">
                  
                
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row ">
                    
                    <div class=" col-12 heading1"><i class="fas fa-user-cog"></i> Modifier mot de passe <hr color="#007399" ></div>
                </div>
                <div class="input-box">
                    <input id="email" type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus required>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label >E-mail</label>
                </div>
                        

                <div style="text-align: center;">
                <button class="btn btn-info" type="submit"><i class="far fa-share-square"></i> Envoyer le lien </button>
                    
                </div>
                    </form>
                    </div>
</div>
@endsection
