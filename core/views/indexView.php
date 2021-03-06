<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Notes Solution</title>

        <link rel="stylesheet" href="/css/main_page.css" />
        <link rel="stylesheet" href="/css/main_page-adaptive.css" />

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    </head>
    <body>
        <header class="header container">
            <form action="/note/create" id="create-note-form" method="post">
                <input type="text" name="noteText" class="input-note-text" />
                <div class="create-note-btn-container">
                    <input id="create-note-btn" type="submit" value="Create" />
                    <img
                        class="create-note-icon"
                        src="/img/create-icon.svg"
                        alt="create-icon"
                    />
                </div>
                <a href="/logout" id="logout-btn">
                    Logout
                    <img
                        class="logout-icon"
                        src="/img/logout-icon.svg"
                        alt="logout-icon"
                    />
                </a>
            </form>
        </header>

        <section class="notes-list-container">
            <!-- <div class="note-container" tabindex="">
                <div class="note-text-container">
                    <span class="note-num">#1.</span>
                    <p class="note-text">
                        My wife asked me to buy some products...
                    </p>
                </div>

                <a href="#" class="remove-note-btn">
                    <img src="/img/trash-icon.svg" alt="remove-note-icon" />
                </a>
            </div> -->
        </section>
    </body>
    <script src="/js/loadNotes.js"></script>
</html>
