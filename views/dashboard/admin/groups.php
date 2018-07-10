<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="blue">
                        <i class="material-icons">group</i>
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title"><?= $title ?>: </span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <?php for ($i = 1; $i < 13; $i++): ?>
                                        <li>
                                            <a href="#<?= $i ?>" data-toggle="tab">
                                                <?= $months[$i] ?>
                                            </a>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                        <div class="tab-content">
                            <?php for ($i = 1; $i < 13; $i++): ?>
                                <div class="tab-pane" id="<?= $i ?>">
                                    <?php foreach ($groups as $group):
                                        if ($i === 4):?>
                                            <div class="card">
                                                <div class="card-header card-header-icon" data-background-color="blue">
                                                    <i class="material-icons">assignment</i>
                                                </div>
                                                <h4 class="card-title"><?= $group['course_title'] . ", Group id: " . $group['id'] ?></h4>
                                                <div class="card-content">
                                                    <div class="material-datatables">
                                                        <table id="groups_students_datatables"
                                                               class="table table-hover waitlist">
                                                            <thead class="thead">
                                                            <tr thead="true">
                                                                <th class="text-center">Student id</th>
                                                                <th>Full name</th>
                                                                <th>Phone number</th>
                                                                <th>Points</th>
                                                                <th>Total points</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            foreach ($group['students'] as $student):
                                                                ?>
                                                                <tr>
                                                                    <td id><?= $student['student_id'] ?></td>
                                                                    <td><?php echo $student['name'] . " " . $student['surname']; ?></td>
                                                                    <td><?= $student['phone_number'] ?></td>
                                                                    <td><?= $student['points'] ?></td>
                                                                    <td><?= $student['total_points'] ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>


                                        <?php endif; endforeach; ?>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    function deleteCourse(id) {
        alert(id);
    }
</script>
