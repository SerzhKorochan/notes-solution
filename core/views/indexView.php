<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes-solution</title>

    <link rel="stylesheet" type="text/css" href="css/index_style.css">
    <link rel="stylesheet" type="text/css" href="css/index_adaptive.css">
</head>
<body>
    <div id="fullBg">
        <header>
            <form action="/note/create" method="POST">
                <div id="textInput"><input type="text" name="note_text"></div>
                <div id="createNotes">
                    <input type="submit" value="Create"></input>
                    <img src="/img/gridicons_create.png" alt="">
                </div>
            </form>
             <div id="logout">
                <a href="/logout">Logout</a>
                <img src="/img/logout.png" alt="">
            </div>
        </header>
        
        <section class="notes-container">
            <div id="blockFirst">
                <div id="first"><span>#1.</span></div>
                <div id="noteferst"><p>My wife asked me to buy some products...</p> </div>
                <img src="/img/ant-design_delete-outlined.png" alt="">
    
            </div>
            <div id="blockSecond">
                <div id="second"><span>#2.</span></div>
                <div id="noteSecond"><p>I have to change something...</p> </div>
                <img src="/img/ant-design_delete-outlined.png" alt="">
    
            </div>
            <div id="blockThird">
                <div id="third"><span>#3.</span></div>
                <div id="noteThird"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna...</p> </div>
                <img src="/img/ant-design_delete-outlined.png" alt="">
    
            </div>
            <div id="blockFourth">
                <div id="fourth"><span>#4.</span></div>
                <div id="noteFourth"><p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam...</p> </div>
                <img src="/img/ant-design_delete-outlined.png" alt="">
    
            </div>
        </section>
        
        
    </div>  

</body>
</html>