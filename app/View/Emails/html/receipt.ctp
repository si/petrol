<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="initial-scale=1.0">    <!-- So that mobile webkit will display zoomed in -->
    <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS -->

    <title>Antwort - responsive Email Layout</title>
    <style type="text/css">

        /* Resets: see reset.css for details */
        .ReadMsgBody { width: 100%; background-color: #ebebeb;}
        .ExternalClass {width: 100%; background-color: #ebebeb;}
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100%;}
        body {-webkit-text-size-adjust:none; -ms-text-size-adjust:none;}
        body {margin:0; padding:0;}
        table {border-spacing:0;}
        table td {border-collapse:collapse;}
        .yshortcuts a {border-bottom: none !important;}


        /* Constrain email width for small screens */
        @media screen and (max-width: 600px) {
            table[class="container"] {
                width: 95% !important;
            }
        }

        /* Give content more room on mobile */
        @media screen and (max-width: 480px) {
            td[class="container-padding"] {
                padding-left: 12px !important;
                padding-right: 12px !important;
            }
        }


        /* Styles for forcing columns to rows */
        @media only screen and (max-width : 600px) {

            /* force container columns to (horizontal) blocks */
            td[class="force-col"] {
                display: block;
                padding-right: 0 !important;
            }
            table[class="col-3"] {
                /* unset table align="left/right" */
                float: none !important;
                width: 100% !important;

                /* change left/right padding and margins to top/bottom ones */
                margin-bottom: 12px;
                padding-bottom: 12px;
                border-bottom: 1px solid #eee;
            }

            /* remove bottom border for last column/row */
            table[id="last-col-3"] {
                border-bottom: none !important;
                margin-bottom: 0;
            }

            /* align images right and shrink them a bit */
            img[class="col-3-img"] {
                float: right;
                margin-left: 6px;
                max-width: 130px;
            }
        }

    </style>
</head>
<body style="margin:0; padding:10px 0;" bgcolor="#ebebeb" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<br>

<!-- 100% wrapper (grey background) -->
<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#ebebeb">
  <tr>
    <td align="center" valign="top" bgcolor="#ebebeb" style="background-color: #ebebeb;">

      <!-- 600px container (white background) -->
      <table border="0" width="600" cellpadding="0" cellspacing="0" class="container" bgcolor="#ffffff">
        <tr>
          <td class="container-padding" bgcolor="#ffffff" style="background-color: #ffffff; padding-left: 30px; padding-right: 30px; font-size: 13px; line-height: 20px; font-family: Helvetica, sans-serif; color: #333;" align="left">
            <br>

            <!-- ### BEGIN CONTENT ### -->


						<h2 style="text-align:center;font-family:Georgia,Times,serif;">~ Your Petrol Receipt ~</h2>
						<table width="100%">
						  <tr>
						    <th  align="center" width="25%">Date</th>
						    <th  align="center" width="25%">Time</th>
						    <th  align="center" width="50%">Station</th>
						  </tr>
						  <tr>
						    <td align="center"><?php echo $this->Time->format('d M Y',$data['Receipt']['created']); ?></td>
						    <td align="center"><?php echo $this->Time->format('h:ia',$data['Receipt']['created']); ?></td>
						    <td align="center"><?php echo $data['Receipt']['location']; ?></td>
						  </tr>
						</table>
						
						<table width="100%">
						  <tr>
						    <th align="center" width="25%">Capacity</th>
						    <th  align="center" width="25%">Price</th>
						    <th  align="center" width="50%">Total</th>
						  </tr>
						  <tr>
						    <td align="center"><?php echo $data['Receipt']['litres']; ?>li</td>
						    <td align="center">£<?php echo $this->Number->precision($data['Receipt']['price_per_litre'],3); ?></td>
						    <td align="center"><strong>£<?php echo $this->Number->precision($data['Receipt']['cost'],2); ?></strong></td>
						  </tr>
						  
						</table>

						<table width="100%">
						  <tr>
						    <th align="center" width="50%">Vehicle</th>
						    <th  align="center" width="50%">Odometer</th>
						  </tr>
						  <tr>
						    <td align="center"><?php echo $data['Vehicle']['name']; ?></td>
						    <td align="center"><?php echo ($data['Receipt']['odometer']); ?></td>
						  </tr>
						  
						</table>

						<!-- Callout Panel -->
						<p class="callout">
							See full details of <a href="http://dev.petrolapp.me/receipts/<?php echo $data['Receipt']['id']; ?>">this transaction online &raquo;</a>
						</p><!-- /Callout Panel -->					
												
        </td>
    </tr>
    <tr>
        <td class="container-padding" bgcolor="#ffffff" style="background-color: #ffffff; padding-left: 30px; padding-right: 30px; font-size: 13px; line-height: 20px; font-family: Helvetica, sans-serif; color: #333;" align="left">
            <br><br>

<a href="http://internations.github.io/antwort/">Using Antwort template</a>
            
            <!-- ### END CONTENT ### -->
            <br><br>

          </td>
        </tr>
      </table>
      <!--/600px container -->

    </td>
  </tr>
</table>
<!--/100% wrapper-->
<br>
<br>
</body>
</html>

