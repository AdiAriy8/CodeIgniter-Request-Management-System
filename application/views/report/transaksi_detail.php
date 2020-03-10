<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <style>
      .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 100%;
            height: 100%;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 0 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url(dimension.png);
        }

        #project {
            float: left;
            /* margin: 0px 0px 0px 25px; */
            padding-left: 20%;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #supplier {
            float: left;
            /* margin: 0px 0px 0px 25px; */
            padding-left: 20%;
        }

        span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div, #supplier div, #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 40px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th, table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service {
            text-align: center;
            width: 10%,
        }

        table .center {
            text-align: center;
            width: 10%,
        }

        table .left {
            text-align: left;
            width: 10%,
        }

        table .desc {
            text-align: left;
            width: 70%
        }

        table td {
            padding: 5px 20px;
            text-align: right;
        }

        table td.service, table td.center, table td.left, table td.desc {
            vertical-align: top;
        }

        table td.unit, table td.qty, table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;

        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="project">
        <div><span>REQUEST NUMBER</span> <?php echo $ret->id ?></div>
        <div><span>STAFF</span> <?php echo $ret->nama_staff ?></div>
        <div><span>STATUS</span> <?php echo $ret->status ?></div>
        <div><span>REQUEST DATE</span> <?php echo isset($ret->tgl_request) ? $ret->tgl_request : "-" ?></div>
        <div><span>SEND DATE</span> <?php echo isset($ret->tgl_kirim) ? $ret->tgl_kirim : "-" ?></div>
        <div><span>FINISH DATE</span> <?php echo isset($ret->tgl_selesai) ? $ret->tgl_selesai : "-" ?></div>
      </div>

      <div id="supplier">
        <div><span>SUPPLIER</span> <?php echo $ret->nama_supplier ?></div>
        <div><span>PERUSAHAAN</span> <?php echo $ret->perusahaan ?></div>
        <div><span>ALAMAT</span> <?php echo $ret->alamat ?></div>
        <div><span>EMAIL</span> <a href="mailto:<?php echo $ret->email ?>"><?php echo $ret->email ?></a></div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="center">NO.</th>
            <th class="left">NAMA BARANG</th>
            <th>QUANTITY</th>
            <th>HARGA</th>
            <th>SUB TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
$total = 0;foreach ($value->result_array() as $row): ?>
            <tr>
              <td class="center"><?php echo $no++ ?></td>
              <td class="left"><?php echo $row['nama'] ?></td>
              <td class="center"><?php echo $row['qty'] ?></td>
              <td><?php echo 'Rp ' . number_format($row['harga']) ?></td>
              <td><?php echo 'Rp ' . number_format($row['harga'] * $row['qty']) ?></td>
              <?php $total += $row['harga'] * $row['qty']?>
            </tr>
          <?php endforeach;?>
        </tbody>
        <thead>
          <tr>
            <th colspan = 3>GRAND TOTAL</th>
            <th colspan = 2><?php echo 'Rp ' . number_format($total) ?></th>
          </tr>
        </thead>
      </table>
      <div id="notices">
        <div>NOTED:</div>
        <div class="notice"><?php echo $ret->noted ?></div>
      </div>
    </main>
    <footer>
      <?php echo $site_title ?>
    </footer>
  </body>
</html>