<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div draggable="true" class="box">A</div>
            <div draggable="true" class="box">B</div>
            <div draggable="true" class="box">C</div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', (event) => {

                function handleDragStart(e) {
                    this.style.opacity = '0.4';

                    dragSrcEl = this;

                    e.dataTransfer.effectAllowed = 'move';
                    e.dataTransfer.setData('text/html', this.innerHTML);
                }

                function handleDragEnd(e) {
                    this.style.opacity = '1';

                    items.forEach(function (item) {
                        item.classList.remove('over');
                    });
                }

                function handleDragOver(e) {
                    e.preventDefault();
                    return false;
                }

                function handleDragEnter(e) {
                    this.classList.add('over');
                }

                function handleDragLeave(e) {
                    this.classList.remove('over');
                }

                function handleDrop(e) {
                    e.stopPropagation();

                    if (dragSrcEl !== this) {
                        dragSrcEl.innerHTML = this.innerHTML;
                        this.innerHTML = e.dataTransfer.getData('text/html');
                    }

                    return false;
                }

                let items = document.querySelectorAll('.container .box');
                items.forEach(function(item) {
                    item.addEventListener('dragstart', handleDragStart);
                    item.addEventListener('dragover', handleDragOver);
                    item.addEventListener('dragenter', handleDragEnter);
                    item.addEventListener('dragleave', handleDragLeave);
                    item.addEventListener('dragend', handleDragEnd);
                    item.addEventListener('drop', handleDrop);
                });
            });
        </script>
    </body>
</html>

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    html, body {
        min-height: 100vh;
    }
    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .container {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 10px;
    }
    .box {
        border: 3px solid #666;
        background-color: #ddd;
        border-radius: .5em;
        padding: 10px;
        cursor: move;
    }

</style>
