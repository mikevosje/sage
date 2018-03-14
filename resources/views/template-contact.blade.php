{{--
  Template Name: Contact Template
--}}

@extends('layouts.app')

@section('contenttop')
    <section id="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="h1-black h1-before"><?php get_field( 'intro_titel' ) ? the_field( 'intro_titel' ) : the_title();?></h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    @php(the_field('contact_intro'))
                    <p><strong>@php(the_field('naam','option'))</strong> <br>
                        @php(the_field('adres','option'))<br>
                        @php(the_field('postcode_&_plaats','option'))<br>
                        Tel. @php(the_field('telefoonnummer','option'))<br>
                        E-mail: <a
                                href="mailto:@php(the_field('email', 'option'))">@php(the_field('email', 'option'))</a>
                    </p>

                    @php($contact_image = get_field('contact_afbeelding'))
                    <img src="{{$contact_image['url']}}" alt="{{$contact_image['alt']}}">
                </div>
                <div class="col-md-6">

					<?php echo do_shortcode( get_field( 'contact_code' ) );?>
                </div>
            </div>
        </div>
    </section>
@endsection
