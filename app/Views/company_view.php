<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <h1>Companies</h1>

    <div class="container-fluid">

        <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group" role="group" aria-label="First group">
                <button type="button" class="btn btn-outline-secondary">Previous</button>
                <button type="button" class="btn btn-outline-secondary">1</button>
                <button type="button" class="btn btn-outline-secondary">2</button>
                <button type="button" class="btn btn-outline-secondary">3</button>
                <button type="button" class="btn btn-outline-secondary">Next</button>
            </div>
            <div class="input-group">
                <div class="input-group-text" id="btnGroupAddon2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </div>
                <input type="text" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="btnGroupAddon2">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    Select Columns
                </button>
                <ul class="dropdown-menu">
                <?php foreach ($table->getSelectableColumns() as $column) : ?>
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="select_columns" value="<?= $column->name ?>" id="<?= $column->name ?>" <?= $column->isSelected() ? 'checked' : '' ?>/>
                                <label class="form-check-label" for="<?= $column->name ?>"><?= $column->getLabel() ?></label>
                            </div>
                        </a>
                    </li>
                <?php endforeach ?>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="" value="" id="select_all_columns" />
                                <label class="form-check-label" for="select_all_columns">Select All</label>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <?= $table->pager->links() ?>

        <?= $table ?>

        <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group" role="group" aria-label="First group">
                <button type="button" class="btn btn-outline-secondary">Previous</button>
                <button type="button" class="btn btn-outline-secondary">1</button>
                <button type="button" class="btn btn-outline-secondary">2</button>
                <button type="button" class="btn btn-outline-secondary">3</button>
                <button type="button" class="btn btn-outline-secondary">Next</button>
            </div>
        </div>

    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

<script type="text/javascript">


    let companyTable = document.getElementById('company')


    let rows = companyTable.tBodies[0].rows

    for (var i = 0; i < rows.length; i++) {
        rows[i].addEventListener("click", toggleRow, { detail: rows[i] } )
        rows[i].querySelector('input').addEventListener('click', function(e) { e.stopPropagation() } )
    }

    function toggleRow() {
        this.querySelector('input').checked=!this.querySelector('input').checked
        this.classList.toggle('table-active')
    }


    let selectAll = companyTable.tHead.rows[0].querySelector('input')
    selectAll.addEventListener('change', toggleAllRows)

    function toggleAllRows() {

        for (var i = 0; i < rows.length; i++) {
            // rows[i].addEventListener("click", toggleRow, { detail: rows[i] } )
            rows[i].querySelector('input').checked = selectAll.checked
            if (selectAll.checked) {
                rows[i].classList.add('table-active')
            } else {
                rows[i].classList.remove('table-active')
            }
        }
    }


    let summaries = document.querySelectorAll('.summary span')

    for (var i = 0; i < summaries.length; i++) {
        summaries[i].addEventListener("click", toggleSummary, { detail: rows[i] } )
    }

    function toggleSummary(element) {
        this.classList.add('d-none')
        var nextSibling = this.nextSibling == null ? this.parentNode.firstChild : this.nextSibling
        nextSibling.classList.remove('d-none')
    }

    function GetSelected() {
        //Reference the Table.
        var grid = document.getElementById("company");
 
        //Reference the CheckBoxes in Table.
        var checkBoxes = grid.getElementsByTagName("INPUT");
        var message = "Id Name                  Country\n";
 
        var elements = {}

        //Loop through the CheckBoxes.
        for (var i = 0; i < checkBoxes.length; i++) {
            if (checkBoxes[i].checked) {
                var row = checkBoxes[i].closest('tr');
                message += row.cells[1].innerHTML;
                message += "   " + row.cells[2].innerHTML;
                message += "   " + row.cells[3].innerHTML;
                message += "\n";
            }
        }
 
        //Display selected Row data in Alert Box.
        console.log(message);
    }

</script>

</html>