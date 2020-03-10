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
    <main>
      <table>
        <thead>
          <tr>
            <th>NO.</th>
            <th>ID.Req</th>
            <th>STAFF</th>
            <th>SUPPLIER</th>
            <th>STATUS</th>
            <th>TGL. REQUEST</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
            foreach ($value->result_array() as $row): ?>
            <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['nama_staff'] ?></td>
              <td><?php echo $row['nama_supplier'] ?></td>
              <td><?php echo $row['status'] ?></td>
              <td><?php echo $row['tgl_request'] ?></td>
              <td><?php echo 'Rp ' . number_format($row['total']) ?></td>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
      <div id="notices">
        <div>Filter:</div>
        <div class="notice"><?php echo $start_date ? $start_date : ''; echo $end_date  ? ' s/d '.$end_date : ''?></div>
        <div class="notice"><?php
        if($status){
          echo "Filer by : ";
          for($i = 0; $i < count($status); $i++){
            if(isset($status[$i])){
              echo $status[$i];
              if(isset($status[$i+1])){
                echo " - ";
              }
            }
          }
        }
        ?></div>
      </div>
    </main>
    <footer>
      <?php echo $site_title ?>
    </footer>
  </body>
</html>
