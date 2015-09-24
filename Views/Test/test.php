<center><h1>Chun Test Page</h1></center>
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