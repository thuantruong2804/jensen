<?php

class QuestionController extends \BaseController {
    protected $layout = 'layouts.admin';
    
    public function __construct(Questions $questions, Answers $answers) {
        parent::__construct();
        $this->questions = $questions;
        $this->answers = $answers;
    }
    

    /**
     * View Random 10 Question and Check Answers
     * @author Thuan Truong
     * @return view
     */
    public function checkAnswer() {
        $input = Input::all();
        if (!empty($input)) {
            $countCorrect = $this->getCorrectAnswers($input);
            
            if ($countCorrect == 10) {
                setcookie('pass_question', 1, time() + 60*10);
                return Redirect::to('/gvc-terms');
            } else {
                $questions = Questions::whereRaw('is_deleted = ?', [0])->orderByRaw('RAND()')->take(10)->get();
                $this->layout = View::make('layouts.application');
                $view = View::make('question.check')->with(array(
                    'errorMessage' => '<i class="fa fa-warning"></i> Bạn chỉ trả lời đúng '.$countCorrect.'/10 câu hỏi !',
                    'questions' => $questions,
                ));
                $this->layout->content = $view;
            }
        } else {
            $questions = Questions::whereRaw('is_deleted = ?', [0])->skip(rand(1, 20))->take(10)->get();
            $this->layout = View::make('layouts.application');
            $view = View::make('question.check')->with(array(
                'questions' => $questions,
                'errorMessage' => ''
            ));
            $this->layout->content = $view;
        }
    }

    /**
     * Check Answer When Register
     * @author: Thuan Truong
     */
    public function getCorrectAnswers($input) {
        $countCorrect = 0;

        $questions = $input['questions'];
        foreach ($questions as $question) {
            if (isset($input['answer_question_'.$question]) && !empty($input['answer_question_'.$question])) {
                $isCorrectAnswer = Answers::whereRaw('question_id = ? and answer_id = ? and is_correct = ?', [$question, $input['answer_question_'.$question], 1])->count();
                if (!empty($isCorrectAnswer)) {
                    $countCorrect ++;
                }
            }
        }

        return $countCorrect;
    }

    /**
     * view gvc term
     * @author Thuan Truong
     * @return view
     */
    public function gvcterms() {
        $this->layout = View::make('layouts.application');
        $view = View::make('question.gvcterms')->with(array(

        ));
        $this->layout->content = $view;
    }

    /**
     * view gvc term
     * @author Thuan Truong
     * @return view
     */
    public function sampterms() {
        $this->layout = View::make('layouts.application');
        $view = View::make('question.sampterms')->with(array(

        ));
        $this->layout->content = $view;
    }

    /**
     * view gvc term
     * @author Thuan Truong
     * @return view
     */
    public function finishregister() {
        $this->layout = View::make('layouts.application');
        $view = View::make('question.finishregister')->with(array(

        ));
        $this->layout->content = $view;
    }


}