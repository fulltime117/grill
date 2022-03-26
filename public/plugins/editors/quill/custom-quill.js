// Basic

var quill = new Quill('#editor-container', {
  modules: {
    toolbar: [
      ['bold', 'italic', 'underline', 'strike'],
      ['image', 'code-block', 'blockquote'],
      [{ 'list': 'ordered'}, { 'list': 'bullet' }],
      [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
      [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
      // [{ 'direction': 'rtl' }], 
      
      [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
      [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
      [{ 'font': [] }],
      [{ 'align': [] }],
      ['clean']          
    ]
  },
  placeholder: 'Write here...',
  theme: 'snow'  // or 'bubble'
});



// With Tooltip

  // var quill = new Quill('#quill-tooltip', {
  //   modules: {
  //     toolbar: '#toolbar-container'
  //   },
  //   placeholder: 'Write here...',
  //   theme: 'snow'
  // });
  
  // Enable all tooltips
  // $('[data-toggle="tooltip"]').tooltip();
  
  // // Can control programmatically too
  // $('.ql-italic').mouseover();
  // setTimeout(function() {
  //   $('.ql-italic').mouseout();
  // }, 2500);