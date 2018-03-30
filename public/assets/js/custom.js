    $(document).ready(function() {


    // var substringMatcher = function(strs) {
    //       return function findMatches(q, cb) {
    //         var matches, substringRegex;
    //         matches = [];
    //         substrRegex = new RegExp(q, 'i');
    //         $.each(strs, function(i, str) {
    //           if (substrRegex.test(str)) {
    //             matches.push(str);
    //           }
    //         });
    //         cb(matches);
    //       };
    //     };


        // var products = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
        //   'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
        //   'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
        //   'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
        //   'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
        //   'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
        //   'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
        //   'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
        //   'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
        // ];

        // var products =  [

        //   function (query, process) {
        //        return $.get( $('#bloodhound').attr('attr-route') , { q: query }, function (data) {
        //             console.log(data);
        //             return process(data);
        //         });
        //     }

        //    ];

        // $('#the-basics .typeahead').typeahead({
        //   hint: true,
        //   highlight: true,
        //   minLength: 1
        // },
        // {
        //   name: 'states',
        //   source: substringMatcher(states);
        // });


       // constructs the suggestion engine
        // var products = new Bloodhound({
        //   datumTokenizer: Bloodhound.tokenizers.whitespace,
        //   queryTokenizer: Bloodhound.tokenizers.whitespace,

        //   local: products
        // });

        // $('#bloodhound .typeahead').typeahead(
        // {
        //   input: 'typeahead form-control',
        //   hint: true,
        //   highlight: true,
        //   minLength: 1
        // },
        // {
        //   name: 'products',
        //   source: products

        // },

        // );

    // $("#searchform").on("click", ".search" ,function() {
    //   var   keyword = data('keyword');

    //   // alert(keyword);

    //   $.ajax({
    //         url: $("#searchform").attr('action'),
    //         type: "GET",
    //         data: {keyword: keyword},
    //         headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         success: function(res){
    //            console.log(html(res));
    //         },
    //         error: function(){
    //             alert("Error");
    //         }
    //     });

    // });


});