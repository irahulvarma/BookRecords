<!DOCTYPE html>
<head>
    <title>Search Author</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/BookRecords/public/assets/css/style.css" />
    
</head>
<body>
    <form action="">
        <input type="search" name="authorname" id="authorname" required>
        <i class="fa fa-search"></i>
        <a href="javascript:void(0)" id="clear-btn"></a>
    </form>
    
    <table id='table'>    
        <thead>
            <tr>
                <th scope="col">Author</th>
                <th scope="col">Name</th>            
            </tr>
        </thead>
        <tbody id="tbody">
                
        </tbody>
    </table>
</body>
<footer>
    <script type="text/javascript" src="/BookRecords/public/assets/js/script.js" ></script>
</footer>
</html>