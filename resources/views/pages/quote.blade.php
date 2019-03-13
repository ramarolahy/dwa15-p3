@extends('layouts.base')

@section('title', 'Quote')

@section('content')
    <!-- MATERIAL DESIGN LITE  Wrapper -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <!--Main app Bootstrap container -->
    <main class="container pt-5">
        <!--Title and intro-->
        <div class="row mt-4">
            <div class="col">
                <h3 class="text-center">Make Pretty Quotes!</h3>
                <div class="card text-center border-0 bg-light py-3">
                    <p class="text-center mdl-card__title-text">
                        Have fun creating some awesome quote cards!
                    </p>
                </div>
            </div>
        </div>
        <!-- App -->
        <div class="card py-5 mt-2 border-0 bg-light">
            <div class="row">
                <!-- Form wrapper-->
                <div class="col-5 pl-5">
                    <form action="QuoteMaker.php" method="get">
                        <div class="card border-0 px-4 pb-2">

                            <!-- Background selection -->
                            <div class="card-body">
                                <h5 class="mdl-card__title-text">Choose Background</h5>
                            </div>
                            <div class="card-body row wrap-card-body__radio">
                                <div class="col-3">
                                    <label class="" for="option-1">
                                        <input type="radio" id="option-1"
                                               class="mdl-radio__button"
                                               name="selectedImg"
                                               value="road.jpeg" <?php if ( $selectedImg === "road.jpeg" ) echo
                                        "checked"
                                            ?>>
                                        <img src="{{ asset('/images/road.jpeg') }} " alt="road">
                                    </label>
                                </div>
                                <div class="col-3">
                                    <label for="option-2">
                                        <input type="radio" id="option-2"
                                               class="mdl-radio__button"
                                               name="selectedImg"
                                               value="fall.jpg"
                                        <?php if ( $selectedImg === "fall.jpg" ) echo "checked" ?>>
                                        <img src="{{ asset('/images/fall.jpg') }}"
                                             alt="fall">
                                    </label>
                                </div>
                                <div class="col-3">
                                    <label class="" for="option-3">
                                        <input type="radio" id="option-3"
                                               class="mdl-radio__button"
                                               name="selectedImg"
                                               value="butterflies.jpeg"
                                        <?php if ( $selectedImg === "butterflies.jpeg" ) echo "checked" ?>>
                                        <img src="{{ asset('/images/butterflies.jpeg') }}"
                                             alt="butterflies">
                                    </label>
                                </div>
                                <div class="col-3">
                                    <label class="" for="option-4">
                                        <input type="radio" id="option-4"
                                               class="mdl-radio__button"
                                               name="selectedImg"
                                               value="leaves.jpeg"
                                        <?php if ( $selectedImg === "leaves.jpeg" ) echo "checked" ?>>
                                        <img src="{{ asset('/images/leaves.jpeg') }}"
                                             alt="leaves">
                                    </label>
                                </div>
                            </div>
                            <!-- END Background selection -->

                            <!-- Quote and Author input -->
                            <div class="card-body">
                                <h5 class="mdl-card__title-text">Add a quote</h5>

                                <div class="mdl-textfield mdl-js-textfield">
                                    <!--If filled, leave text on input area
                                    in case
                                        the user needs to make correction-->
                                    <textarea class="mdl-textfield__input" rows="2" id="quote" name="quote"><?php echo $quote ? $quote : null ?>
                                    </textarea>
                                </div>
                                <!--If left empty, print error message-->
                                <?php if ( $errors[ "quote" ] ) : ?>
                                <div class="alert alert-danger mb-2">
                                        <?= $errors[ "quote" ] ?>
                                    </div>
                                <?php endif; ?>
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <!--If filled, leave text on input area
                                         in case
                                        the user needs to make correction-->
                                    <input class="mdl-textfield__input"
                                           type="text" id="bottomText"
                                           name="author"
                                           value="<?php echo $author ? $author : null ?>">
                                    <label class="mdl-textfield__label"
                                           for="bottomText">Author...</label>
                                </div>
                                <!--If left empty, print error message-->
                                <?php if ( $errors[ "author" ] ) : ?>
                                <div class="alert alert-danger mb-2">
                                        <?= $errors[ "author" ] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- END Quote and Author input -->

                            <!-- Text background -->
                            <div class="card bg-light border-0 mb-2 py-3 px-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-10">
                                            <label
                                                class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
                                                for="addBackground">
                                                <!--If previously checked,
                                                leave checked, unless there
                                                was error-->
                                                <input type="checkbox"
                                                       id="addBackground"
                                                       class="mdl-checkbox__input"
                                                       name="addBackground"
                                                       value="true"<?php if (
                                                    isset(
                                                        $addBackground ) and
                                                    $addBackground and !$hasErrors ) echo checked ?> >
                                                <span
                                                    class="mdl-checkbox__label mdl-card__title-text">Add Text Background</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Text background -->

                            <!-- Submit button -->
                            <div class="card-body">
                                <button class=" float-right mdl-button mdl-js-button mdl-button--raised
                                mdl-js-ripple-effect mdl-button--colored" type="submit">
                                    Show me!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- END Form -->

                <!-- Quote poster -->
                <div class="col-7 pr-5">
                    <!--  Put canvas here -->
                    <div id="quoteImg" class="wrap-quote mdl-card
                    mdl-shadow--2dp" style="width: auto;"></div>
                    <!-- Poster div -->
                    <div class="wrap-quote mdl-card mdl-shadow--2dp"
                         style="<?php echo ( $imgBg ) ? $imgBg : "background-color:#313f48;" ?>" id="myQuote">
                        <!--On first load OR if there are errors, print default
                        quote
                        .-->
                        <?php if ( $hasErrors or !$quote ) : ?>
                        <div class="default_quote">
                                <span class="text__top">"A nice quote for a nice day!"</span><br>
                                <span class="text__top">~~~</span>
                            </div>
                    <?php endif ?>
                    <!--Add text background if no errors-->
                        <div class="<?php if ( !$hasErrors ) echo $textBg ?>
                            quote-text text-center py-5">
                            <!--If there are no errors, print quote and
                            author-->
                            <span
                                class="text__top"><?php echo !$hasErrors ? $quote : null ?></span>
                            <br><br>
                            <span
                                class="text__top"><?php if ( !$hasErrors and $author != "" ) echo "~~ " . $author . " ~~" ?></span>
                        </div>
                    </div>
                    <!-- END Poster div -->

                    <br>
                    <!-- Info -->
                    <p class="alert-info pl-3">Right click on image, and
                                               choose <b>Save Image As...</b> to save your new quote card.
                    </p>
                </div>
                <!-- END Quote poster-->
            </div>
        </div>
        <!-- END App -->
    </main>
</div>
    <!-- END MDL Wrapper -->
@stop

@section('script')
    html2canvas(document.getElementById("myQuote")).then(canvas => {
    document.getElementById("quoteImg").appendChild
    (canvas)
    });
@stop
