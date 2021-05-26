//for department
$(document).on("click", ".dept", function(){ /* WHEN A BUTTON IS CLICKED */

    var depart_id = $(this).attr('value'); /* GET which department IS IT */
    $.ajax({ /* START AJAX */
      type: "POST", /* METHOD TO USE TO PASS THE DATA */
      url: "Sort_Department.php", /* FILE WHERE WE WILL PROCESS THE PASSED ON DATA */
      data: { "department": depart_id }, /* DATA TO BE PASSED ON */
      success: function(result){ /* GET THE RETURNED DATA FROM sort_department.php */
        $("#sortTab").html(result); /* PUT THE RETURNED DATA TO view_Department.php */
      }
    });
  });
//For employeeee
  $(document).on("click", ".empId", function(){ /* WHEN A BUTTON IS CLICKED */

    var empl_id = $(this).attr('value'); /* GET which employee IS IT */
    $.ajax({ /* START AJAX */
      type: "POST", /* METHOD TO USE TO PASS THE DATA */
      url: "sort_Employee.php", /* FILE WHERE WE WILL PROCESS THE PASSED ON DATA */
      data: { "Employeee": empl_id }, /* DATA TO BE PASSED ON */
      success: function(result){ /* GET THE RETURNED DATA FROM sort_Employee.php */
        $("#SortEq").html(result); /* PUT THE RETURNED DATA TO view_employment */
      }
    }); 
  });
//for categoryy
  $(document).on("click", ".categoryN", function(){ /* WHEN A BUTTON IS CLICKED */

    var categ_id = $(this).attr('value'); /* GET which category IS IT */
    $.ajax({ /* START AJAX */
      type: "POST", /* METHOD TO USE TO PASS THE DATA */
      url: "sort_category.php", /* FILE WHERE WE WILL PROCESS THE PASSED ON DATA */
      data: { "Category": categ_id }, /* DATA TO BE PASSED ON */
      success: function(result){ /* GET THE RETURNED DATA FROM sort_category.php */
        $("#Category").html(result); /* PUT THE RETURNED DATA TO view_Category.php */
      }
    });
  });