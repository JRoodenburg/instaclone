<nav style="border: none;"><div class="searching">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="search" id="searchform" placeholder="Search">
        <input type="text" id="searchbox" name="searchterm">
        <input type="submit" name="search" onchange="this.form.submit()" value="Search">
    </form>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <select onchange="this.form.submit()" name="sort" title="sort">
            <option selected disabled>Sort on:</option>
            <option value="date_asc">date up</option>
            <option value="date_desc">date down</option>
            <option value="descr_asc">description up</option>
            <option value="descr_desc">description down</option>
        </select>
<!--        <input type="submit" name="submit_sort" value="Sort" />-->
    </form>
        <?php
        $column = 'date';
        $order = 'DESC';
        if(isset($_POST['sort'])){
            switch($_POST['sort']) {
                case 'date_asc':
                    $column = 'date';
                    $order = 'ASC';
                break;

                case 'date_desc':
                    $column = 'date';
                    $order = 'DESC';
                    break;

                case 'descr_asc':
                    $column = 'description';
                    $order = 'ASC';
                    break;

                case 'descr_desc':
                    $column = 'description';
                    $order = 'DESC';
                    break;
            }
        }

        ?>
    <div>
    </nav>