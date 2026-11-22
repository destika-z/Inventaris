<style>
    @page{
        margin:25px;
    }

    body{
        font-family: DejaVu Sans, sans-serif;
        color:#374151;
        font-size:11px;
    }

    /* ===========================
   HEADER
=========================== */

.header{
    width:100%;
    margin-bottom:20px;
}

.header-table{
    width:100%;
    border-collapse:collapse;
}

.logo-col{
    width:100px;
    text-align:center;
    vertical-align:middle;
}

.logo-col img{
    width:100px;
    height:auto;
}

.title-col{
    text-align:center;
    vertical-align:middle;
    padding-right:70px;
}

.title-col h1{
    margin:0;
    font-size:24px;
    font-weight:bold;
    color:#1f2937;
    letter-spacing:1px;
    text-transform:uppercase;
}

.title-col h2{
    margin:8px 0 4px;
    font-size:18px;
    font-weight:600;
    color:#374151;
}

.title-col p{
    margin:0;
    font-size:15px;
    color:#6b7280;
}

.header-line{
    border:0;
    border-top:2px solid #374151;
    margin:18px 0 20px;
}

    /* ===========================
       INFO BOX
    =========================== */

    .info-box{
        width:70%;
        margin:20px auto;
        border:1px solid #dcdfe4;
        border-radius:14px;
        overflow:hidden;
        display:table;
        table-layout:fixed;
    }

    .info-item{
        display:table-cell;
        width:33.33%;
        text-align:center;
        padding:14px 10px;
        border-right:1px solid #e5e7eb;
        vertical-align:middle;
    }

    .info-item:last-child{
        border-right:none;
    }

    .info-item span{
        display:block;
        font-size:11px;
        color:#777;
        margin-bottom:6px;
    }

    .info-item strong{
        display:block;
        font-size:16px;
        color:#333;
        font-weight:700;
    }

    /* ===========================
       TABLE
    =========================== */

    .data-table{
        width:100%;
        border-collapse:collapse;
        margin-top:18px;
    }

    .data-table th{
        background:#ef6c00;
        color:#fff;
        font-size:10px;
        padding:10px 6px;
        text-align:center;
        border:1px solid #dddddd;
    }

    .data-table td{
        border:1px solid #dddddd;
        padding:8px 6px;
        font-size:10px;
        vertical-align:middle;
    }

    .data-table tbody tr:nth-child(even){
        background:#fafafa;
    }

    .text-center{
        text-align:center;
    }

    .text-bold{
        font-weight:bold;
    }

    /* ===========================
       LEBAR KOLOM
    =========================== */

    .col-no{
        width:5%;
    }

    .col-kode{
        width:11%;
    }

    .col-nama{
        width:21%;
    }

    .col-kategori{
        width:16%;
    }

    .col-lokasi{
        width:15%;
    }

    .col-jumlah{
        width:8%;
    }

    .col-kondisi{
        width:14%;
    }

    .col-tanggal{
        width:18%;
    }

    /* ===========================
       FOOTER
    =========================== */

    .footer{
        margin-top:25px;
        text-align:center;
        color:#999;
        font-size:10px;
    }
</style>