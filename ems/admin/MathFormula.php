

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>A Simple Page with CKEditor 4</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script src="math/ckeditor.js"></script>
    </head>
    <body>
        <form method="post">
            <textarea name="editor1" id="editor1" rows="10" cols="80">
               
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>

           
        </form>
    </body>
</html>