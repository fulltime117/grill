<template>
    
    <div>
        <div class="form-group">
            <label >Question <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="q" placeholder="fill in question">
        </div>
        
        <div class="form-group row">
            
            <div class="col-md-6">
                <label for="course">Select Course</label>
                <select class="form-control selectpicker" id="course"
                    v-model="selectedCourse"
                    @change="selectCourse">
                    <option value="-1"></option>
                    <option v-for="course in allCourses" :key="course.id" 
                        :value="course.id"
                        > {{ course.course_name }} | #{{ course.id}}</option>    
                </select>
            </div>
            
            
            <div class="col-md-6">
                <label for="lesson">Select Lesson <span class="text-danger">*</span></label>
                <select class="form-control" id="lesson" name="lesson_id"
                    v-model="selectedLesson">
                    <option v-if="!selectedCourse" data-course_id="-1"></option>
                        <option 
                            v-for="les in allLessons" :key="les.id"
                            :data-course_id="les.course_id" 
                            :value="les.id">{{ les.lesson_name }} | #{{ les.course_id}}</option>    
                </select>
            </div>

        </div>
            
            
        <div v-for="index in 4" :key="index" class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <div class="n-chk align-self-end">
                        <label class="new-control new-radio radio-success" style="height: 21px; margin-bottom: 0; margin-left: 0">
                          <input type="radio" class="new-control-input" name="radio-button" @click="setAnswerNumber(index)">
                          <span class="new-control-indicator"></span>
                        </label>
                    </div>
                </div>
            </div>
            <input type="text" :name="optionName(index)" class="form-control" aria-label="radio">
        </div>
        
        <div class="form-group">
            <input type="text" name="answer_number" readonly class="form-control" v-model="answerNumber" placeholder="Please select Correct Answer">
        </div>
    </div>
                    
</template>

<script>
    
    export default {
        name: 'AddQuestion',
        props: {
            courses: {
                type: Array,
                required: true
            },
            lessons: {
                type: Array,
                required: true
            },
            lesson: {
                type: Object ,
                required: false
            },
        },
        data() {
            return {
                allCourses: this.courses,
                allLessons: this.lessons,
                selectedLesson: this.ifSelectedLesson(),
                selectedCourse: this.ifSelectedCourse(),
                answerNumber: '',
            }
        },
        mounted() {
            console.log('add-question is mounted');
        },
        
        computed: {
                    
        },
        methods: {
            optionName(index) {
                return 'opt' + parseInt(index) ;
            },
            
            selectCourse(){
                if(this.selectedCourse !== '-1') {
                    this.allLessons = this.lessons.filter(le => le.course_id == this.selectedCourse);
                }else {
                    this.allLessons = this.lessons;
                    this.selectedCourse = null;
                }
            },
            
            setAnswerNumber(index){
                this.answerNumber = index;
            },
            
            formSubmit() {
                document.getElementById('add_question_form').submit();
            },
            
            ifSelectedLesson() {
                if(this.lesson){
                    return this.lesson.id;
                }else {
                    return null;
                }
            },
            
            ifSelectedCourse() {
                if(this.lesson) {
                    return this.lesson.course_id;
                }else {
                    return null;
                }
            },
            
        },
        
    }
</script>
