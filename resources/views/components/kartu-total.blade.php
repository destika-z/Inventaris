@props(['text', 'total', 'route', 'icon', 'color'])

<div class="col-xl-3 col-md-6 mb-4">

    <a href="{{ route($route) }}" class="text-decoration-none">

        <div class="card stat-card h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <small class="stat-title">
                            {{ $text }}
                        </small>

                        <h2 class="stat-total">
                            {{ $total }}
                        </h2>

                    </div>

                    <div class="stat-icon bg-{{ $color }}">

                        <i class="bi {{ $icon }}"></i>

                    </div>

                </div>

            </div>

            <div class="card-footer stat-footer">

                <span>
                    Lihat Selengkapnya
                </span>

                <i class="bi bi-arrow-right"></i>

            </div>

        </div>

    </a>

</div>