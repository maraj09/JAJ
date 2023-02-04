<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .left-column {
            background-color: #f2f2f2;
            padding: 20px;
            height: 100vh;

            resize: horizontal;
            overflow: auto;
        }

        .right-column {
            background-color: #ffffff;
            padding: 20px;
            height: 100vh;
        }

        .code-editor {
            height: 60vh;
        }
    </style>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!--Navigation Section-->

    <?php include 'header.php'; ?>

    <!--End of Navigation Section-->
    <div class="container-fluid">
        <div class="row main">
            <div class="col-md-8 left-column">

                <div class="problem-details">
                    <form id="submit-form">

                        <h4>Select Language</h4>

                        <select name="language" class="form-control">
                            <option value="54">C++ (GCC 9.2.0)</option>
                            <option value="62">Java (OpenJDK 13.0.1)</option>
                            <option value="71">Python (3.8.1)</option>
                        </select>

                        <h4>Source Code</h4>
                        <textarea name="sourceCode" class="form-control code-editor"></textarea>


                    </form>
                </div>

            </div>
            <div class="col-md-4 right-column">
                <form id="submit-form">



                    <div class="test-cases">

                        <h4>Test Cases</h4>

                        <div class="form-group">

                            <label>Input Test Case</label>
                            <textarea name="testCase" class="form-control "></textarea>

                        </div>
                        <div class="form-group">

                            <label>Expected Output</label>
                            <textarea name="expectedOutput" class="form-control "></textarea>

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>



                    </div>
                </form>
                <iframe name="submit-iframe" style="display: none;"></iframe>

            </div>
        </div>
    </div>

    <script>
        const submitForm = document.querySelector('#submit-form');
        submitForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(submitForm);
            fetch('./Controller/submission.php', {
                    method: 'post',
                    body: formData
                })
                .then(response => response.text())
                .then(result => {
                    alert(result);

                });
        });
    </script>


</body>

</html>