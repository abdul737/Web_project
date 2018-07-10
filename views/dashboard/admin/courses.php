<div class="content">
    <div class="container-fluid">
        <div class="text-right">
            <a href="add_course" class="btn btn-info btn-fill">Add course</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title"><?= $title ?></h4>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Name</th>
                                    <th>Length</th>
                                    <th>Pre-requisite</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                echo "\n<br>\n";
                                foreach ($allCourses as $course) {
                                    $courseId = $course->getCourseId();
                                    $title = $course->getTitle();
                                    $length = $course->getLength();
                                    echo "<tr>
                                                <td class='text-center'>$i</td>
                                                <td><b>$title</b></td>
                                                <td>$length lessons</td>";
                                    echo "<td>";
                                    foreach ($prereq as $req) {
                                        if ($req['course'] == $course->getTitle()) {
                                            echo $req['required_course'] . "<br>";
                                        }
                                    }
                                    echo "</td>";
                                    echo "
                                                <td class='td-actions text-right'>
                                                    <button type='button' rel='tooltip' class='btn btn-info'>
                                                        <i class='material-icons'>info</i>
                                                    </button>
                                                    <button type='button' rel='tooltip' class='btn btn-success'>
                                                        <i class='material-icons'>edit</i>
                                                    </button>
                                                    <button type='button' rel='tooltip' onclick='deleteCourse($courseId)' class='btn btn-danger'>
                                                        <i class='material-icons'>close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            ";
                                    $i++;
                                }
                                ?>
                                </tbody>
                            </table>
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
