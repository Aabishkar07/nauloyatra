<div class="footer-wave">
    <img src="{{ asset('image/footer.svg') }}" alt="Footer background" width="100%">
</div>

<footer class="footer-neo">
    <div class="footer-neo-inner">
        <div class="row g-4">
            <div class="col-12 col-lg-4">
                <h6>About NauloYatra</h6>
                <div style="color: rgba(255,255,255,0.88); line-height: 1.75;">
                    NauloYatra Tours &amp; Travels is your local travel partner in Nepal—offering curated tours,
                    trekking experiences, and custom itineraries with trusted guides and smooth logistics.
                </div>

                <div class="footer-social" aria-label="Social links">
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                    <a href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-2 footer-links">
                <h6>Useful Links</h6>
                <a href="{{ route('aboutUs') }}">About Us</a>
                <a href="{{ route('user.travelPackage.show') }}">Nepal Tours</a>
                <a href="#">Client Reviews</a>
                <a href="#">Plan Your Trip</a>
                <a href="{{ route('blog') }}">Blog</a>
            </div>

            <div class="col-12 col-md-6 col-lg-3 footer-links">
                <h6>Explore</h6>
                <a href="#">Outbound Tours</a>
                <a href="#">Photo Gallery</a>
                <a href="#">Customize Trip</a>
                <a href="#">FAQs</a>
                <a href="{{ route('contactUs') }}">Contact Us</a>
            </div>

            <div class="col-12 col-lg-3">
                <h6>Contact</h6>

                <div class="footer-contact-item">
                    <i class="bi bi-geo-alt"></i>
                    <div>
                        NauloYatra Tours &amp; Travels Pvt. Ltd.<br>
                        Kathmandu, Nepal
                    </div>
                </div>

                <div class="footer-contact-item">
                    <i class="bi bi-envelope"></i>
                    <div>nauloyatra@gmail.com</div>
                </div>

                <div class="footer-contact-item">
                    <i class="bi bi-telephone"></i>
                    <div>+977 98XXXXXXXX</div>
                </div>
            </div>
        </div>

        <div class="mt-4 pt-3" style="border-top: 1px solid rgba(255,255,255,0.16);">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2" style="color: rgba(255,255,255,0.78);">
                <div>© {{ date('Y') }} NauloYatra Tours &amp; Travels. All rights reserved.</div>
                <div class="d-flex gap-3 footer-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </div>
</footer>