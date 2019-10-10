<div class="sidebar">

    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="../../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a aria-expanded="true" onclick="return false;">
                        <span>
                            <?php
                            session_start();
                            echo $_SESSION['name'];
                            echo<<<END
 <span class=user-level>{$_SESSION['role']}</span>
END;
                            ?>
                        </span>

                    </a>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item active">
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#teacher">
                        <i class="fas fa-users"></i>
                        <p>Teacher</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="teacher">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="index.php?src=add-teacher">
                                    <span class="sub-item">Add Teacher</span>
                                </a>
                            </li>
                            <li>
                                <a id="view-all-students" href="" onclick="return false;">
                                    <span class="sub-item">View All Teachers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#student">
                        <i class="fas fa-pen-square"></i>
                        <p>Student</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="student">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="index.php?src=add-attendance" id="add-attendance" >
                                    <span class="sub-item">Add Student</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?src=view-all-attendance" id="view-attendance">
                                    <span class="sub-item">View All Student</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#reports">
                        <i class="fas fa-layer-group"></i>
                        <p>Reports</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="reports">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="components/avatars.html">
                                    <span class="sub-item">View Reports</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>