<center><h1>Hello im first demo chun page<h1></center>
<center><h2>Im listing from included database</h2></center>
<center>
    <table border="2">
        <thead>
                <th>Emp.FirstName</th>
                <th>Emp.LastName</th>
                <th>Emp.Phone</th>
                <th>Emp.Name</th>
        </thead>
        <tbody>
            <?php
                foreach(ViewManagerBase::$MODELS["chuntesttable"] as $model)
                {
                    echo"<tr>";
                        echo "<td>".$model['EmpFirstName']."</td>";
                        echo "<td>".$model['EmpLastName']."</td>";
                        echo "<td>".$model['EmpPhone']."</td>";
                        echo "<td>".$model['EmpEmail']."</td>";
                    echo"</tr>";
                }
            ?>
            <tr></tr>
        </tbody>
    </table>
</center>
<center><h3>Powered by:Chun</h3></center>