<footer class="footer-area">
    <div class="container">
        <div class="footer-top">
            <div class="footer-social-link mt-5">
                <!-- sponsor logos -->
                <ul class="list-unstyled">
                    <li><a href="https://digitizationacademy.org" target="_blank" data-sal="slide-up" data-sal-duration="500"
                           data-sal-delay="100"><img src="{{ vite_asset('resources/media/logo.svg') }}"
                                                     alt="Digitization Academy"
                                                     width="175px" style="filter:grayscale(99%);"></a></li>
                    <li><a href="https://www.idigbio.org/" target="_blank" data-sal="slide-up" data-sal-duration="500"
                           data-sal-delay="200"><img
                                src="{{ vite_asset('resources/media/logos/logo-idigbio.svg') }}"
                                alt="IDigBio"
                                style="z-index:1; display:block; position: relative;"
                                width="175px"></a></li>
                    <li><a href="https://idiginfo.org/" target="_blank" data-sal="slide-up" data-sal-duration="500"
                           data-sal-delay="400"><img
                                src="{{ vite_asset('resources/media/logos/idiginfo.png') }}"
                                style="z-index:1; display:block; position: relative;"
                                alt="iDigInfo"
                                width="175px"></a></li>
                    <li><a href="https://www.fsu.edu" target="_blank" data-sal="slide-up" data-sal-duration="500"
                           data-sal-delay="300"><img
                                src="{{ vite_asset('resources/media/logos/logo-fsu.svg') }}" alt="FSU"
                                style="z-index:1; display:block; position: relative;"
                                width="100px"></a>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="mt-0 mb-5">

        <div class="footer-main">
            <div class="row">
                <div class="col-md-8 offset-md-3 col-sm-12 " data-sal="slide-right" data-sal-duration="800"
                     data-sal-delay="100">
                    <div class="footer-widget border-end">
                        <div class="footer-newsletter">
                            <h6 class="widget-title">{{ t('Sponsorships') }}</h6>
                            <p>{{ t('iDigBio is funded by grants from the National Science Foundation [DBI-1115210
                                (2011-2018), DBI-1547229 (2016-2022), & DBI-2027654 (2021-2026)]. Any
                                opinions,
                                findings, and conclusions or recommendations expressed in this material are
                                those of
                                the author(s) and do not necessarily reflect the views of the National
                                Science
                                Foundation.') }}</p>

                            <!--<form>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Email address">
                                    <button class="subscribe-btn" type="submit">Subscribe</button>
                                </div>
                                </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom" data-sal="slide-up" data-sal-duration="500" data-sal-delay="100" style="z-index:1;">
            <div class="row">
                <div class="col-md-8">
                    <div class="footer-copyright"0>
                        <span class="copyright-text">
                            {{ t('© Copyright 2023 | iDigInfo and Department of Biological Science, Florida State University | ') }}
                            <a href="https://agencyks.com/">{{ t('Site by Agency Ks') }}</a>.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
