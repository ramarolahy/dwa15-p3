<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class QuoteController extends Controller {


        // Get Quote main page
        public function home () {
            return view ( 'pages.quotes.home' );
        }

        // Get Create Quote
        public function create () {
            $state = [
                'textBg'        => 'quote-text__bg',
                'imgBg'         => null,
                'selectedImg'   => null,
                'quote'         => null,
                'author'        => null,
                'addBackground' => null,
                'errors'        => null,
                'hasErrors'     => null
            ];

            return view ( 'pages.quotes.create', $state );
        }


        //
        public function new ( Request $request ) {

            $validateData = $request->validate ( [
                                                     'author'       => 'required',
                                                     'quote'        => 'required',
                                                     'myBackground' => 'file|image|mimes:jpeg,jpg,png,gif|max:2048'
                                                 ] );
            $selectedImg = \request ( 'selectedImg' );

            $bgImages = [ 'butterflies.jpeg', 'fall.jpg', 'leaves.jpeg', 'road.jpeg' ];

            if ( $selectedImg ) {
                $imgBg = asset ('/images/'. $selectedImg);

            }
            elseif ( $request->hasFile ( 'myBackground' ) ) {
                $imgBg = $request->file ( 'myBackground' );
                // generate a new filename. getClientOriginalExtension() for the file extension
                $filename = 'my-image-' . time () . '.' .
                    $imgBg->getClientOriginalExtension ();
                //                // save to storage/app/photos as the new $filename
                $path = $imgBg->storeAs('public/images', $filename);
                $imgBg = asset ('storage/public/images/'. $filename);
            }
            else {
                $selectedImg = $bgImages[ array_rand ( $bgImages ) ];
                $imgBg = $imgBg = asset ('/images/'. $selectedImg);
            }

            $quote = $validateData[ 'quote' ];
            $author = $validateData[ 'author' ];
            $addBackground = \request ( 'addBackground' );
            $textBg = 'quote-text__bg';

            $state = [
                'textBg'        => $textBg,
                'imgBg'         => $imgBg,
                'selectedImg'   => $selectedImg,
                'quote'         => $quote,
                'author'        => $author,
                'addBackground' => $addBackground,
                'errors'        => null,
                'hasErrors'     => null
            ];

            return view ( 'pages.quotes.create', $state );
        }
    }
