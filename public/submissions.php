<!doctype html>
<html lang="en">

<head>
    <title>JAJ</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom CSS-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/submissions.css">
</head>

<body>


    <!--Navigation Section-->

    <?php include './View/partials/header.php'; ?>

    <!--End of Navigation Section-->

    <!--Submissions Sectiop-->

    <div class="container-fluid">
        <div class="row" style="margin-top: 20px">
            <div class="col-12 text-center" style="margin-right:30px;">

                <h4>Submissions</h4>
                <div class="table-responsive">

                    <table class="table table-striped table-hover align-middle" id="myTable">


                        <?php

                        include "./Database/Connection.php";

                        $query = "select s.id,s.created_at,s.problem,s.verdict,s.time,s.memory , u.UserName,l.lang  
                        from submissions s 
                        join users u  
                        on u.id = s.who 
                        join languages l 
                        on l.id = s.lang";
                        $result = mysqli_query($connect, $query);

                      
                        echo '
                        <thead class="thead-light">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">When</th>
                        <th scope="col">Who</th>
                        <th scope="col">Problem</th>
                        <th scope="col">Lang</th>
                        <th scope="col">Verdict</th>
                        <th scope="col">Time</th>
                        <th scope="col">Memory</th>
                        </tr>
                        </thead>';



                        while ($row = mysqli_fetch_array($result)) {

                            $time = $row['time'] * 1000;
                            $color  = 'red';
                            if ($row['verdict'] == 'Accepted')
                                $color = 'green';
                                
                            echo "<tbody>
                          <tr>
                          <td>" . "<a href=\"#\" class=\"show_code\">" . $row['id']. "</a>" . "</td>
                          <td>" . $row['created_at'] . "</td>
                          <td>" . $row['UserName'] . "</td>
                          <td>" . $row['problem']  . "</td>
                          <td>" . $row['lang'] . "</td>
                          <td style=\"color:$color;\">" . $row['verdict'] . "</td>
                          <td>" . $time . ' ms' . "</td>
                          <td>" .  $row['memory'] . ' kb'. "</td>
                    

                        </tr>
                        </tbody>";
                        }


                        ?>



                    </table>
                </div>

            </div>
        </div>




        <footer>
            <p>
                Made with <i class="fa fa-heart"></i> by Freon Devs
            </p>
        </footer>
        <script src="/resources/library/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.0/typed.min.js" integrity="sha512-zKaK6G2LZC5YZTX0vKmD7xOwd1zrEEMal4zlTf5Ved/A1RrnW+qt8pWDfo7oz+xeChECS/P9dv6EDwwPwelFfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            var typed = new Typed('.welcome', {
                strings: ["WELCOME TO FEC OJ(BETA)", "The Place for Competitive Programmers"],
                typeSpeed: 200
            });
        </script>
</body>

</html>