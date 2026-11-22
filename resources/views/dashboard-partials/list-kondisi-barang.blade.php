<style>
.kondisi-wrapper{
    min-height:330px;
    display:flex;
    align-items:center;
}

.chart-container{
    position:relative;
    width:230px;
    height:230px;
    margin:auto;
}

.chart-center{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%, -50%);
    text-align:center;
    pointer-events:none;
}

.chart-center h2{
    margin:0;
    font-size:36px;
    font-weight:700;
    color:#222;
}

.chart-center span{
    font-size:14px;
    color:#777;
}
</style>

<div class="kondisi-wrapper">

    <div class="row align-items-center w-100">

        {{-- Chart --}}
        <div class="col-md-6 text-center mb-3 mb-md-0">

            <div class="chart-container">

                <canvas id="kondisiChart"></canvas>

                <div class="chart-center">

                    <h2>{{ $jumlahBarang }}</h2>

                    <span>Total Barang</span>

                </div>

            </div>

        </div>

        {{-- Keterangan --}}
        <div class="col-md-6">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div class="d-flex align-items-center">

                    <span
                        class="rounded-circle me-2"
                        style="width:12px;height:12px;background:#22c55e;">
                    </span>

                    <span>Baik</span>

                </div>

                <strong class="fs-5">
                    {{ $kondisiBaik }}
                </strong>

            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div class="d-flex align-items-center">

                    <span
                        class="rounded-circle me-2"
                        style="width:12px;height:12px;background:#facc15;">
                    </span>

                    <span>Rusak Ringan</span>

                </div>

                <strong class="fs-5">
                    {{ $kondisiRusakRingan }}
                </strong>

            </div>

            <div class="d-flex justify-content-between align-items-center">

                <div class="d-flex align-items-center">

                    <span
                        class="rounded-circle me-2"
                        style="width:12px;height:12px;background:#ef4444;">
                    </span>

                    <span>Rusak Berat</span>

                </div>

                <strong class="fs-5">
                    {{ $kondisiRusakBerat }}
                </strong>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('kondisiChart');

new Chart(ctx,{

    type:'doughnut',

    data:{

        labels:[
            'Baik',
            'Rusak Ringan',
            'Rusak Berat'
        ],

        datasets:[{

            data:[
                {{ $kondisiBaik }},
                {{ $kondisiRusakRingan }},
                {{ $kondisiRusakBerat }}
            ],

            backgroundColor:[
                '#22c55e',
                '#facc15',
                '#ef4444'
            ],

            borderWidth:0,

            hoverOffset:8

        }]

    },

    options:{

        responsive:true,

        maintainAspectRatio:false,

        cutout:'68%',

        plugins:{

            legend:{
                display:false
            },

            tooltip:{
                enabled:true
            }

        },

        animation:{
            animateRotate:true,
            duration:1200
        }

    }

});

</script>