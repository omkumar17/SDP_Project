<html lang="en">
<?php  include 'connection.php';
if(!isset($_COOKIE['userID']))
{
    header("Location:login.php");
}
if(!isset($_GET['oid'])){
    header("location:index.php");
}
if(isset($_GET['crtquant'])){
    $quan=$_GET['crtquant'];
    $crtid=$_GET['crtid'];
    $sql="UPDATE cart_tbl SET p_quantity='$quan' WHERE cartID= '$crtid'";
    $res=$conn->query($sql);
}
if(isset($_GET['oid'])){
    $orid=$_GET['oid'];
}
$check="SELECT  `order_id` FROM `order_tbl` WHERE `user_id`='$user'";
$chres=$conn->query($check);
$chflag=1;
w
while($chrow=$chres->fetch_assoc()){
    if($orid==$chrow['order_id']){
        $chflag=0;
        break;
    }
}

if($chflag==1){
    header("location:index.php");
}

$amt=0;
$status="";
$ship="";
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="public\css\nav.css">
    <link rel="stylesheet" href="public\css\home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Mulish', sans-serif;
        }

        :root {
            --text-clr: #4f4f4f;
        }

        p {
            color: #6c757d;
        }

        a {
            text-decoration: none;
            color: var(--text-clr);
        }

        a:hover {
            text-decoration: none;
            color: var(--text-clr);
        }

        h2 {
            color: var(--text-clr);
            font-size: 1.5rem;
        }

        .main_cart {
            background: #fff;
        }

        .card {
            border: none;
        }

        .product_img img {
            min-width: 200px;
            max-height: 200px;
        }

        .product_name {
            color: black;
            font-size: 1.4rem;
            text-transform: capitalize;
            font-weight: 500;
        }

        .card-title p {
            font-size: 0.9rem;
            font-weight: 500;
        }

        .remove-and-wish p {
            font-size: 0.8rem;
            margin-bottom: 0;
        }

        .price-money h3 {
            font-size: 1rem;
            font-weight: 600;
        }

        .set_quantity {
            position: relative;
        }

        /* .set_quantity::after {
            content: "(Note, 1 piece)";
            width: auto;
            height: auto;
            text-align: center;
            position: absolute;
            bottom: -20px;
            right: 1.5rem;
            font-size: 0.8rem;
        } */

        .page-link {
            line-height: 16px;
            width: 45px;
            font-size: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #495057;
        }

        .submit {
            position: absolute;
            top: 40px;
            left: 80px;
            color: white;
            background-color: black;
            border: 2px solid black;
            border-radius: 5px;
            opacity: 0.5;
        }

        .submit:hover {
            opacity: 1;
        }

        .page-item input {
            line-height: 22px;
            padding: 3px;
            font-size: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .page-link:hover {
            text-decoration: none;
            color: #495057;
            outline: none !important;
        }

        .page-link:focus {
            box-shadow: none;
        }

        .price_indiv p {
            font-size: 1.1rem;
        }

        .fa-heart:hover {
            color: red;
        }

        .alttext {
            text-align: center;
            font-size: 5vw;
            color: teal;
            /* height:100%; */
            margin: 20%;
            font-weight: 800;
            line-height: 90px;
        }

        .additem {
            font-size: 1vw;
            line-height: 30px;
            background: teal;
            color: white;
            border: 2px solid teal;
            border-radius: 10px;
            padding: 10px;
            margin-top: 30px;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }

        .addbtn {
            background: teal;
            color: white;
            border: 2px solid teal;
        }

        .additem:hover,
        .addbtn:hover {
            background: black;
            border: 2px solid black;
            color: white;

        }
        @media only screen and (max-width:500px){
            .description{
                width:100%;
            }
        }
        .action{
            display:flex;
            justify-content:space-around;
            align-items:center;
            margin-top:60px;
        }
        .buttons{
            margin-right:30px;
            display:flex;
            justify-content:center;
            align-items:center;
            height:60px;
            width:140px;
            color:white;
            background:red;
            border-radius:10px;
            font-size:18px;
            font-weight:800;
            cursor:pointer;
        }
        .canceltext{
            
            display:flex;
            justify-content:center;
            align-items:center;
            display:none;
        }
        .details{
            border-top:1px solid black;
            display:flex;
            flex-direction:column;
            height:auto;
            width:100%;
            justify-content:center;
            align-items:center;
        }
        .details div{
            display:flex;
            flex-direction:row;
            width:60%;
        }
        .title{
            margin:10px 0;
            width:30%;
            color:teal;
            font-weight:bold;
        }
        .titledetail{
            margin:10px 0;
            width:70%;
        }
        input[type="radio"] {
            margin-right: 5px;
        }

        label {
            display: inline-block;
            margin-bottom: 8px;
        }
        .canceltext {
            text-align: center;
            padding: 20px;
        }

        .cancelcontainer {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 900px;
            margin: auto;
        }
        .sub{
            margin-left:200px;
        }
        .rej{
            margin-left:200px;
        }
    </style>
    <title>cart</title>
</head>

<body>
    <div class="bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-11 mx-auto">
                    <div class="row mt-5 gx-3">
                        <!-- left side div -->
                        <div class="col-md-12 col-lg-8 col-11 mx-auto main_cart mb-lg-0 mb-5 shadow">
                            <?php
                        $sql="SELECT * FROM order_detail WHERE order_id=$orid AND quantity!=0";
                        $result=$conn->query($sql);
                        $total=0.0;
                        if($result->num_rows !=0){
                        while($row=$result->fetch_assoc())
                        {
                            $crtid=$row['order_id'];
                            $crtsize=$row['size'];
                            $crtprid=$row['product_id'];
                            $crtquan=$row['quantity'];
                            $crtcol=$row['color'];
                            $crtsql="SELECT * FROM product_desc INNER JOIN color ON color.cid=product_desc.cid  INNER JOIN image ON image.cid=color.cid INNER JOIN product ON product.Product_id=color.product_id  WHERE product.Product_id='$crtprid' AND product_desc.size='$crtsize' AND color.color='$crtcol'";
                            $crtresult=$conn->query($crtsql);
                            $crtrow=$crtresult->fetch_assoc();
                            
                            ?>
                            <div class="card p-4">
                                <!-- <h2 class="py-4 font-weight-bold">Cart</h2> -->
                                <div class="row">
                                    <div
                                        class="col-md-5 col-11 mx-auto bg-light d-flex justify-content-center align-items-center shadow product_img">
                                        <img src="<?php echo $crtrow['Image_path1']; ?>" class="img-fluid"
                                            alt="cart img">
                                    </div>
                                    <!-- cart product details -->
                                    <div class="col-md-7 col-11 mx-auto px-4 mt-2">
                                        <div class="row">
                                            <!-- product name  -->
                                            <span class=" description col-5 card-title">
                                                <h1 class="mb-4 product_name">
                                                    <?php echo $crtrow['product_name']; ?>
                                                </h1>
                                                <p class="mb-2">COLOR:
                                                    <?php echo $crtrow['color']; ?>
                                                </p>
                                                <p class="mb-3">SIZE:
                                                    <?php echo $crtrow['size']; ?>
                                                </p>
                                                <p class="mb-3">QUANTITY:
                                                    <?php echo $crtquan; ?>
                                                </p>
                                                </span>
                                            <span class="description col-7 card-title">
                                                <?php echo ($crtrow['product_details']); ?>
                                            </span>
                                            <!-- quantity inc dec -->
                                            <!--  -->
                                        <!-- //remover move and price -->
                                        <div class="description row">
                                            
                                            <div class="description col-4 d-flex justify-content-end price_money" style="justify-content:flex-start!important">
                                                <h3>&#8377;<span id="itemval<?php echo $crtsize.$crtcol;?>">
                                                        <?php echo ($crtrow['price']*$crtquan); ?>
                                                    </span></h3>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <?php
                        $total=$total+($crtrow['price']*$crtquan);
                        }
                    }
                    else{
                        ?>
                            <div class="alttext">No items in cart<br><br><a href="select.php" class="additem">Add
                                    items</a></div>

                            <?php
                    }
                    
                        
                    ?>
                            <!-- 2nd cart product -->

                        </div>
                        <div class="details" >
                            <?php
                            $det="SELECT * FROM `order_tbl` WHERE order_id='$orid'";
                            $detres=$conn->query($det);
                            while($detrow=$detres->fetch_assoc()){?>
                            <div><div class="title">Order id</div><div class="titledetail"><?php echo $detrow['order_id'];?></div></div>
                            <div><div class="title">User id</div><div class="titledetail"><?php echo $detrow['user_id'];?></div></div>
                            <div><div class="title">Name</div><div class="titledetail"><?php echo $detrow['fname'].' '.$detrow['lname'];?></div></div>
                            <div><div class="title">Mobile no.</div><div class="titledetail"><?php echo $detrow['mobile'];?></div></div>
                            <div><div class="title">Email</div><div class="titledetail"><?php echo $detrow['email'];?></div></div>
                            <div><div class="title">Order date</div><div class="titledetail"><?php echo $detrow['order_date'];?></div></div>
                            <div><div class="title">shipping address</div><div class="titledetail"><?php echo $detrow['shipping_address'];?></div></div>
                            <div><div class="title">order Status</div><div class="titledetail"><?php $status=$detrow['order_status']; echo $detrow['order_status'];?></div></div>
                            <div><div class="title">order Amount</div><div class="titledetail"><?php $amt=$detrow['order_amount']; echo $detrow['order_amount'];?></div></div>
                            <div><div class="title">shipping status</div><div class="titledetail"><?php $ship=$detrow['shipping_status']; echo $detrow['shipping_status'];?></div></div>
                            
                            <?php
                            }
                            ?>
                        </div>
                        <!-- right side div -->
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <?php
    if($status!="cancel" && $status!="replace" && $status=="complete"){
        ?>
    <div class="action">
        <div class="buttons cancel" style="width:auto;padding-right:20px;padding-left:20px;margin-bottom:50px;" onclick=cancelorder()>Cancel / Replace Order</div>
        <!-- <div class="buttons"></div> -->
        
    </div>
    <?php
    }
    else{
        ?>
    <div class="action">
        <div class="buttons view" style="width:auto;padding-right:20px;padding-left:20px;margin-bottom:50px;" >view status</div>
        <!-- <div class="buttons"></div> -->
        
    </div>
    <?php
    }
    ?>
    
    <div class="canceltext">
        <div class="cancelcontainer">
            <form action="cancel.php" method="post">
                <input type="hidden" class="hidden" name="oid" value="<?php echo $orid;?>" >
                <input type="hidden" class="hidden" name="amt" value="<?php echo $amt;?>" >
                <input type="radio" name="cancel" value="Dont want product" id="r1" required>
                <label for="r1">Dont want product</label><br>
                <input type="radio" name="cancel" value="Wrong product" id="r2" required>
                <label for="r2">Wrong product</label><br>
                <input type="radio" name="cancel" value="Defective product" id="r3" required>
                <label for="r3">Defective product</label><br>
                <input type="radio" name="cancel" value="Wrong Details provided" id="r4" required>
                <label for="r4">Wrong Details provided</label><br><hr>

                <input type="radio" name="type" value="cancel" id="tp1" required>
                <label for="tp1">Return</label><br>
                <input type="radio" name="type" value="replace" id="tp2" required>
                <label for="tp2">Replace</label><br>  
                <!-- <input type="radio" name="cancel" value="">
                <label for=""></label><br>
                <input type="radio" name="cancel" value="">
                <label for=""></label><br> -->
                <br>
                <div class="all" style="display:flex;flex-direction:row;justify-content:center">
                <input type="submit" class="buttons " value="Initiate">
                
                <button class="buttons reject" style="background:blue" value="Reject cancellation">Reject cancellation</button>
            </div>
        </form>
        </div>
    </div>
    
    
    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>

    <script type="text/javascript">

        var product_total_amt = document.getElementById('product_total_amt');
        var shipping_charge = document.getElementById('shipping_charge');
        var total_cart_amt = document.getElementById('total_cart_amt');
        var discountCode = document.getElementById('discount_code1');
        const decreaseNumber = (incdec, itemprice, pprice) => {
            var itemval = document.getElementById(incdec);
            var itemprice = document.getElementById(itemprice);
            console.log(itemprice.innerHTML);
            // console.log(itemval.value);
            if (itemval.value <= 0) {
                itemval.value = 0;
                alert('Negative quantity not allowed');
            } else {
                itemval.value = parseInt(itemval.value) - 1;
                itemval.style.background = '#fff';
                itemval.style.color = '#000';
                itemprice.innerHTML = parseInt(itemprice.innerHTML) - parseInt(pprice);
                product_total_amt.innerHTML = parseInt(product_total_amt.innerHTML) - parseInt(pprice);
                total_cart_amt.innerHTML = parseInt(product_total_amt.innerHTML) + parseInt(shipping_charge.innerHTML);
            }
        }
        const increaseNumber = (incdec, itemprice, pprice) => {
            var itemval = document.getElementById(incdec);
            var itemprice = document.getElementById(itemprice);
            // console.log(itemval.value);
            // if (itemval.value >= 5) {
            //     itemval.value = 5;
            //     alert('max 5 allowed');
            //     itemval.style.background = 'red';
            //     itemval.style.color = '#fff';
            // } else {
            itemval.value = parseInt(itemval.value) + 1;
            itemprice.innerHTML = parseInt(itemprice.innerHTML) + parseInt(pprice);
            product_total_amt.innerHTML = parseInt(product_total_amt.innerHTML) + parseInt(pprice);
            total_cart_amt.innerHTML = parseInt(product_total_amt.innerHTML) + parseInt(shipping_charge.innerHTML);
            // }
        }

        const discount_code = () => {
            let totalamtcurr = parseInt(total_cart_amt.innerHTML);
            let error_trw = document.getElementById('error_trw');
            if (discountCode.value === 'foot15') {
                let newtotalamt = totalamtcurr - 15;
                total_cart_amt.innerHTML = newtotalamt;
                error_trw.innerHTML = "Hurray! code is valid";
            } else {
                error_trw.innerHTML = "Try Again! Valid code is thapa";
            }
        }

        //     var crtfrm=document.querySelectorAll(".quanform");
        //     var inp=document.querySelectorAll(".quant");
        //     var submit=document.querySelectorAll(".submit");
        //     for (var i = 0; i < crtfrm.length; i++) {
        //         submit[i].addEventListener("click", function () {
        //             console.log("kak");
        //             crtfrm[i].submit();
        //         })
        // }
        var rejectButton = document.querySelector(".reject");

rejectButton.addEventListener("click", function(event) {
    document.querySelector(".canceltext").style.display="none";
    document.querySelector(".cancel").style.display="flex";
    event.preventDefault(); // This prevents the default form submission behavior
});


        function cancelorder(){
            
            if(confirm("are you sure you want to cancel or return order ?")){
                document.querySelector(".canceltext").style.display="flex";
                document.querySelector(".cancel").style.display="none";

            }
        }
        const cancelForm = document.getElementById('cancelForm');
        const rejectButtons = document.querySelector('.reject');

        
        rejectButtons.addEventListener('click', function (event) {
                // Temporarily disable required attribute before rejection action
                const radioButtons = cancelForm.querySelectorAll('input[type="radio"]');
                radioButtons.forEach(radio => {
                    radio.removeAttribute('required');
                });
                // Proceed with rejection action
                // You can add your code here to hide the radio buttons or perform any other action
            });
       
       
    </script>

    

</body>

</html>