<div class="logo"><a href="index.php" class="simple-text logo-normal">
        <img src="img/cpelogo.png" alt="cpelogos" width="50" height="50">
        CPE-SMS
    </a></div>
<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item <?php if($active=='index') echo 'active'; ?>">
            <a class="nav-link" href="index.php">
                <i class="material-icons">home</i>
                <p>Home</p>
            </a>
        </li>
        <li class="nav-item <?php if($active=='r0') echo 'active'; ?>">
            <a class="nav-link" href="r0-form.php">
                <i class="material-icons">assignment</i>
                <p>R0 Form</p>
            </a>
        </li>
        <li
            class="nav-item <?php if($active=='ace-add') echo 'active'; ?> <?php if($active=='ace-change') echo 'active'; ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="material-icons">assignment_turned_in</i>
                <span>Ace Forms</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class=" py-2 collapse-inner rounded">

                    <a class="dropdown-item text-white" href="ace-add.php">Adding of Subject</a>
                    <a class="dropdown-item text-white" href="ace-change.php">Change of Subject</a>
                </div>
            </div>
        </li>
        <li class="nav-item <?php if($active=='overload') echo 'active'; ?> ">
            <a class="nav-link" href="overload.php">
                <i class="material-icons">text_snippet</i>
                <p>Overload Request</p>
            </a>
        </li>
        <li class="nav-item  <?php if($active=='override') echo 'active'; ?> ">
            <a class="nav-link" href="override.php">
                <i class="material-icons">library_books</i>
                <p>Override Request</p>
            </a>
        </li>
        <li class="nav-item <?php if($active=='addslot') echo 'active'; ?> ">
            <a class="nav-link" href="addslot.php">
                <i class="material-icons">fact_check</i>
                <p>Adding of Slot</p>
            </a>
        </li>
        <li class="nav-item <?php if($active=='accreditation') echo 'active'; ?> ">
            <a class="nav-link" href="accreditation.php">
                <i class="material-icons">post_add</i>
                <p>Accreditation Form</p>
            </a>
        </li>
        <li class="nav-item <?php if($active=='completion') echo 'active'; ?> ">
            <a class="nav-link" href="completion.php">
                <i class="material-icons">sticky_note_2</i>
                <p>Completion Form</p>
            </a>
        </li>

    </ul>
</div>
</div>