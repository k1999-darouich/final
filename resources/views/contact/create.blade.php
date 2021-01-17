@extends('layouts.app')
@section('title','Contact Us')
@section('content')
    
      

<div class="container   " style="margin-top: 4rem;">

<div class="row">
<div class="col-md-4">
<div class="content" style="color: white;">
<h2>Information </h2>
                
                <h6>Ecole Normale Supérieure de l'Enseignement Technique</h6>
                
                <p><i class="fas fa-map-marker"></i> : BP 159 Bd Hassan II Mohammedia</p>
                <p><i class="fas fa-phone-alt"></i> : 05 23 32 22 20 - 05 23 32 35 30</p>
                <p><i class="fas fa-fax"></i> : 05 23 32 25 46</p>
            </div>
<div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3319.165094895023!2d-7.36264734966472!3d33.704676680607236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7b6d0db170185%3A0x79759da1a916fc50!2sENSET%20Mohammedia!5e0!3m2!1sen!2sma!4v1610831317125!5m2!1sen!2sma" width="100%" height="225" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
</div>
<div class="col-md-8 bg-white " style=" box-shadow: -5px -5px 5px rgba(0, 0, 0, 0.5);">

<form class="" action="/contact" method="POST">
        @csrf
        <div class="row ">
            <div class="col-8 box2 offset-2 ">
                <div class="row ">
                    
                    <div class=" col-12 heading1">Contactez-nous<hr color="#007399" ></div>
                </div>
                @if(session()->has('message'))
    <div class="alert alert-success" role="alert">
        <strong>Thank you</strong><br>
        {{ session()->get('message')}}
    </div>
@endif
                <div class="input-box">
                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus required>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label >Nom</label>
                </div>
                <div class="input-box">
                    <input id="email" type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus required>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label >Email</label>
                </div>
                <div class="input-box">
                    <textarea id="message" placeholder="message" width="100%" type="textarea" rows="4" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" autocomplete="message" autofocus required>
                    </textarea>
                    @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                </div>
         

                <input type="submit" value="Envoyer " class="mb-3"/>

            </div>

        </div>


    </form>
</div>
</div></div>

@endsection