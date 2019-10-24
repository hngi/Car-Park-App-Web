const options = document.querySelectorAll('.options')

function put() {
  options.forEach(cur => cur.classList.remove('options1'))
  this.classList.add('options1')
}

options.forEach(cur => cur.addEventListener('click', put))







var ctx = document.getElementById('myChart').getContext('2d');
var ctx2 = document.getElementById('myChart2').getContext('2d');
var ctx3 = document.getElementById('myChart3').getContext('2d');
var ctx4 = document.getElementById('myChart4').getContext('2d');


var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['Male    ', 'Female'],
    datasets: [{
      label: '# of Votes',
      data: [9, 27],
      backgroundColor: [
        '#F0C419',
        '#71C285'
      ],
      borderWidth: 1
    }]
  },
  options: {
    title: {
      display: true,
      text: 'Gender',
      position: 'top'
    },
    legend: {
      display: true,
      position: 'bottom',
    }
  }
});

// chart 2

var myChart2 = new Chart(ctx2, {
  type: 'pie',
  data: {
    labels: ['Abuja', 'Lagos', 'Jos    '],
    datasets: [{
      label: '# of Votes',
      data: [9, 5, 22],
      backgroundColor: [
        '#F0C419', 
        '#71C285', 
        '#556080'
      ],
      borderWidth: 1
    }]
  },
  options: {
    title: {
      display: true,
      text: 'Location',
      position: 'top'
    },
    legend: {
      display: true,
      position: 'bottom',
    }
  }
});

// chart 3

var myChart3 = new Chart(ctx3, {
  type: 'pie',
  data: {
    labels: ['Airtel', 'MTN'],
    datasets: [{
      label: '# of Votes',
      data: [4, 32],
      backgroundColor: [
        '#F0C419', 
        '#F0785A'
      ],
      borderWidth: 1
    }]
  },
  options: {
    title: {
      display: true,
      text: 'Mobile Networks',
      position: 'top'
    },
    legend: {
      display: true,
      position: 'bottom',
    }
  }
});

// chart 4

var myChart4 = new Chart(ctx4, {
  type: 'pie',
  data: {
    labels: ['IOS      ', 'Android'],
    datasets: [{
      label: '# of Votes',
      data: [8, 28],
      backgroundColor: [
        '#B771C2', 
        '#19F0F0'
      ],
      borderWidth: 1
    }]
  },
  options: {
    title: {
      display: true,
      text: 'Phone',
      position: 'top'
    },
    legend: {
      display: true,
      position: 'bottom',
    }
  }
});