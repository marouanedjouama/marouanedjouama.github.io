function toggleDropdown(id) {
    var dropdownContent = document.getElementById(id);
    dropdownContent.classList.toggle("show");

    var dropdowns = document.getElementsByClassName("dropdown-content1");
    for (var i = 0; i < dropdowns.length; i++) {
      if (dropdowns[i].id !== id && dropdowns[i].classList.contains('show')) {
        dropdowns[i].classList.remove('show');
      }

      var dropdowns = document.getElementsByClassName("dropdown-content2");
      for (var i = 0; i < dropdowns.length; i++) {
        if (dropdowns[i].id !== id && dropdowns[i].classList.contains('show')) {
          dropdowns[i].classList.remove('show');
        }
      }
    }
  }

  window.onclick = function (event) {
    if (!event.target.matches('.css-1d3uik7')) {
      var dropdowns1 = document.getElementsByClassName("dropdown-content1");
      for (var i = 0; i < dropdowns1.length; i++) {
        var openDropdown = dropdowns1[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
      var dropdowns2 = document.getElementsByClassName("dropdown-content2");
      for (var i = 0; i < dropdowns2.length; i++) {
        var openDropdown = dropdowns2[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }


  const sortBtnWorst = document.getElementById('sort-worst');
  const sortBtnBest = document.getElementById('sort-best');
  const sortBtnPopular = document.getElementById('sort-popular');
  const originalOrder = Array.from(document.querySelectorAll('#tableID tbody tr'));
  const originalTable = document.getElementById('tableID');

  const searchButton = document.querySelector('#search-button');
  searchButton.addEventListener('click', searchTable);

  /// the function searchTable() executes when enter key pressed.
  const searchInput = document.querySelector('#search-input');
  searchInput.addEventListener('keyup', (event) => {
    if (event.keyCode === 13) { // Enter key
      searchTable();
    }
  });



  const ButtonReset = document.querySelector('#resetButton');
  ButtonReset.addEventListener('click', () => {
    sortTableDefault();
  })

  const ButtonDefault = document.querySelector('#all-faculties');
  ButtonDefault.addEventListener('click', () => {
    sortTableDefault();
  })

  const filterButton1 = document.querySelector('#LL');
  filterButton1.addEventListener('click', () => {
    filterTable(1, 'Literature and languages');
  })

  const filterButton2 = document.querySelector('#ENLS');
  filterButton2.addEventListener('click', () => {
    filterTable(1, 'Exact sciences, natural sciences and life sciences');
  })

  const filterButton3 = document.querySelector('#EMC');
  filterButton3.addEventListener('click', () => {
    filterTable(1, 'Economics, management and commerce');
  })

  const filterButton4 = document.querySelector('#ST');
  filterButton4.addEventListener('click', () => {
    filterTable(1, 'Sciences and technology');
  })

  const filterButton5 = document.querySelector('#LPS');
  filterButton5.addEventListener('click', () => {
    filterTable(1, 'Law and political sciences');
  })

  const filterButton6 = document.querySelector('#SSH');
  filterButton6.addEventListener('click', () => {
    filterTable(1, 'LSocial sciences and humanities');
  })

  const filterButton7 = document.querySelector('#ISTPSA');
  filterButton7.addEventListener('click', () => {
    filterTable(1, 'Institute of sciences and technics of physical and sport activities');
  })

  


  // Attach an event listener to the button that sorts the table rows when clicked
  sortBtnWorst.addEventListener('click', () => {
    sortTableWorst();
  });

  sortBtnBest.addEventListener('click', () => {
    sortTableBest();
  });

  sortBtnPopular.addEventListener('click', () => {
    sortTablePopular();
  });

  // Function that sorts the table rows based on the values in the second column
  function sortTableWorst() {
    // Get the table element
    const table = document.getElementById('tableID');

    // Get all the rows in the table and convert to an array
    const rows = Array.from(table.rows).slice(1);

    // Sort the rows based on the values in the second column (index 1)
    rows.sort((a, b) => {
      const aVal = parseFloat(a.cells[2].querySelector('div div').textContent.trim());
      const bVal = parseFloat(b.cells[2].querySelector('div div').textContent.trim());
      return aVal - bVal;
    });
    const tbody = document.createElement('tbody');
    table.appendChild(table.rows[0]);
    rows.forEach(row => {
      table.appendChild(row);
    });
    const oldTbody = table.querySelector('tbody');
    if (oldTbody) {
      table.removeChild(oldTbody);
    }
    // Add the new tbody element to the table
    table.appendChild(tbody);
  }

  function sortTableBest() {
    const table = document.getElementById('tableID');
    const rows = Array.from(table.rows).slice(1);
    rows.sort((a, b) => {
      const aVal = parseFloat(a.cells[2].querySelector('div div').textContent.trim());
      const bVal = parseFloat(b.cells[2].querySelector('div div').textContent.trim());
      return aVal - bVal;
    });
    rows.reverse();
    const tbody = document.createElement('tbody');
    table.appendChild(table.rows[0]);
    rows.forEach(row => {
      table.appendChild(row);
    });

    const oldTbody = table.querySelector('tbody');
    if (oldTbody) {
      table.removeChild(oldTbody);
    }
    table.appendChild(tbody);
  }

  function sortTablePopular() {
    const table = document.getElementById('tableID');
    const rows = Array.from(table.rows).slice(1);
    rows.sort((a, b) => {
      const aVal = parseFloat(a.cells[2].querySelector('div div:nth-child(2)').textContent.trim());
      const bVal = parseFloat(b.cells[2].querySelector('div div:nth-child(2)').textContent.trim());
      return aVal - bVal;
    });
    rows.reverse();
    const tbody = document.createElement('tbody');
    table.appendChild(table.rows[0]);
    rows.forEach(row => {
      table.appendChild(row);
    });

    const oldTbody = table.querySelector('tbody');
    if (oldTbody) {
      table.removeChild(oldTbody);
    }
    table.appendChild(tbody);
  }

  function sortTableDefault() {
    const tbody1 = document.querySelector('#tableID tbody');
    // Remove the existing rows
    while (tbody1.firstChild) {
      tbody1.removeChild(tbody1.firstChild);
    }
    // Append the original order of rows
    originalOrder.forEach(row => {
      tbody1.appendChild(row);
    });
  }

  //  bug A1: the function filterTable() executes correctly the first time only, then i'll have to reset the table for it to work;
  function filterTable(columnIndex, filterValue) {
    sortTableDefault(); /// a very naiv solution to the bug A1
    const table = document.getElementById('tableID');
    const rows = Array.from(table.rows).slice(1);
    const tbody = document.createElement('tbody');
    table.appendChild(table.rows[0]);
    rows.forEach(row => {
      const cellValue = row.cells[columnIndex].textContent.trim();
      if (cellValue === filterValue) {
        table.appendChild(row);
      }
    });
    const oldTbody = table.querySelector('tbody');
    if (oldTbody) {
      table.removeChild(oldTbody);
    }
    table.appendChild(tbody);
  }


  //////
  function searchTable() {
    sortTableDefault(); /// a very naiv solution to the bug A1
    const input = document.querySelector('#search-input');
    const filterValue = input.value.toLowerCase();
    const tableRows = document.querySelectorAll('#tableID tbody tr');
    const table = document.getElementById('tableID');
    const rows = Array.from(table.rows).slice(1);
    const tbody = document.createElement('tbody');
    table.appendChild(table.rows[0]);
    tableRows.forEach(row => {
      let isMatch = false;
      Array.from(row.cells).forEach(cell => {
        const cellValue = row.cells[0].textContent.trim().toLowerCase();
        if (cellValue.includes(filterValue)) {
          isMatch = true;
        }
      });
      if (isMatch) {
        table.appendChild(row);
      }
    });
    const oldTbody = table.querySelector('tbody');
    if (oldTbody) {
      table.removeChild(oldTbody);
    }
    table.appendChild(tbody);
  }
