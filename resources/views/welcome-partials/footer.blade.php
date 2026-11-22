<style>
/* ===========================
   FOOTER
=========================== */

.footer-section{
    background:linear-gradient(135deg,#ff9800,#ef6c00);
    color:#fff;
    padding:60px 0 25px;
    margin-top:80px;
}

.footer-logo{
    width:70px;
    height:auto;
}

.footer-title{
    font-size:32px;
    font-weight:800;
    margin-bottom:8px;
}

.footer-title span{
    color:#ffd54f;
}

.footer-heading{
    font-size:22px;
    font-weight:700;
    margin-bottom:20px;
}

.footer-section p{
    color:rgba(255,255,255,.92);
    line-height:1.8;
}

.footer-social{
    display:flex;
    gap:15px;
    margin-top:15px;
}

.footer-social a{
    width:48px;
    height:48px;
    border-radius:50%;
    background:rgba(255,255,255,.18);
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:22px;
    text-decoration:none;
    transition:.3s;
}

.footer-social a:hover{
    background:#fff;
    color:#ef6c00;
    transform:translateY(-4px);
}

.footer-line{
    border-color:rgba(255,255,255,.2);
    margin:35px 0 20px;
}

.footer-copy{
    color:rgba(255,255,255,.85);
    font-size:15px;
}

@media(max-width:768px){

    .footer-section{
        text-align:center;
    }

    .footer-social{
        justify-content:center;
    }

    .footer-logo{
        margin-bottom:15px;
    }

    .footer-social img{
    width:22px;
    height:22px;
    object-fit:contain;
}

.footer-section p img{
    vertical-align:middle;
}
}
</style>

<footer id="kontak" class="footer-section">

    <div class="container">

        <div class="row gy-4 align-items-start">

            {{-- Logo --}}
            <div class="col-lg-5">

                <div class="d-flex align-items-start">

                    <img src="{{ asset('images/smk.png') }}"
                         alt="Logo"
                         class="footer-logo me-3">

                    <div>

                        <h4 class="footer-title mb-2">
                            Inven<span>Bar</span>
                        </h4>

                        <p class="mb-0">
                            Sistem Inventaris Barang
                            <br>
                            Solusi cerdas untuk manajemen inventaris modern.
                        </p>

                    </div>

                </div>

            </div>

            {{-- Kontak --}}
            <div class="col-lg-4">

                <h5 class="footer-heading">
                    Kontak Kami
                </h5>

                <p class="mb-2">
    <img src="{{ asset('images/email.png') }}" width="18" class="me-2" alt="Email">
    smkn_padaherang@yahoo.co.id
</p>

<p class="mb-2">
    <img src="{{ asset('images/web.png') }}" width="18" class="me-2" alt="Website">
    www.smkn1padaherang.sch.id
</p>

<p class="mb-0">
    <img src="{{ asset('images/wa.png') }}" width="18" class="me-2" alt="WhatsApp">
    0813-1373-3344
</p>

            </div>

            {{-- Sosial Media --}}
            <div class="col-lg-3">

                <h5 class="footer-heading">
                    Ikuti Kami
                </h5>

              <div class="footer-social">

    <a href="https://www.instagram.com/smknegeri1padaherang/" target="_blank">
        <img src="{{ asset('images/ig.png') }}" width="22" alt="Instagram">
    </a>

    <a href="https://www.youtube.com/@smkn1padaherang" target="_blank">
        <img src="{{ asset('images/youtube.png') }}" width="22" alt="YouTube">
    </a>

      <a href="https://www.facebook.com/SMKNegeri1Padaherang/" target="_blank">
        <img src="{{ asset('images/facebook.png') }}" width="22" alt="Facebook">
    </a>

 <a href="https://www.tiktok.com/@smknegeri1padaherang" target="_blank">
        <img src="{{ asset('images/tiktok.png') }}" width="22" alt="Tiktok">
    </a>

</div>

            </div>

        </div>

        <hr class="footer-line">

        <div class="text-center footer-copy">
            © 2025 InvenBar - SMK Negeri 1 Padaherang. All Rights Reserved.
        </div>

    </div>

</footer>