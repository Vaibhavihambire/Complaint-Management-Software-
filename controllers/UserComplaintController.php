<?php

namespace app\controllers;

use Yii;
use app\models\UserComplaint;
use app\models\UserComplaintSearch;
use app\models\Logs;
use app\models\Engdetails;
use app\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\ForbiddenHttpException;
use yii\db\Expression;

/**
 * UserComplaintController implements the CRUD actions for UserComplaint model.
 */
class UserComplaintController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            // Check if the user is a guest
            if (Yii::$app->user->isGuest) {
                // Redirect guests to the index page
                $this->redirect(['/site/index'])->send();
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * Lists all UserComplaint models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserComplaintSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->sort->attributes['sent2eng'] = [
            'asc' => ['sent2eng' => SORT_ASC],
            'desc' => ['sent2eng' => SORT_DESC],
        ];
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionShowall($showAll = false)
    {
        $searchModel = new UserComplaintSearch();

        if ($showAll) {
            Yii::$app->session->set('showAllComplaints', true);
        } else {
            Yii::$app->session->set('showAllComplaints', false);
            $searchModel->scenario = 'showAll'; // Set the 'showAll' scenario when the button is clicked
        }

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } 

    /**
     * Displays a single UserComplaint model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model =  $this->findModel($id);
        $passed = ($model->status == '❌' || $model->status === '') ? 0 : 1;
        return $this->render('view', [
            // 'model' => $this->findModel($id),
            'model' =>$model,
            'passed'=>$passed,
        ]);
    }

    /**
     * Creates a new UserComplaint model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    // {
    //     $model = new UserComplaint();

    //     if ($this->request->isPost) {
    //         if ($model->load($this->request->post()) && $model->save()) {
    //             return $this->redirect(['view', 'id' => $model->id]);
    //         }
    //     } else {
    //         $model->loadDefaultValues();
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }
    {
        if (Yii::$app->user->can('create-complaint')) {
            $model = new UserComplaint();
            $modelsEngdetails = new Engdetails();
            $modelLogs = new Logs();
    
            if ($model->load(Yii::$app->request->post())) {
                $model->sent2eng = false;
    
                // Create an instance of the current user
                $user = Yii::$app->user;
                $id = $user->id;
                $model->created_by = $id;
    
                $modelLogs->byUserId = $id;
                $modelLogs->byUserName = Yii::$app->user->identity->username;
                $modelLogs->description = "Created new Complaints";
    
                if ($model->validate()) {
                    $transaction = \Yii::$app->db->beginTransaction();
    
                    try {
                        if ($model->save(false)) {
                            $transaction->commit();
                            $modelLogs->save(false);
                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                    } catch (Exception $e) {
                        $transaction->rollBack();
                    }
                }
            }
    
            return $this->render('create', [
                'model' => $model,
                'modelsEngdetails'=>$modelsEngdetails,
            ]);
        } else {
            throw new ForbiddenHttpException;
        }
    }

    public function actionSent($id)
    {
        $model = $this->findModel($id);
        // if ($this->request->isPost && $model->load($this->request->post())) {
            $model->sent2eng = "1";
            $model->status = "";
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
    }

    public function getSent($id)
    {
        $model = $this->findModel($id);
            return $model->sent2eng;
    }

    public function actionComp($id)
    {
       
        $model = $this->findModel($id);

        // if ($this->request->isPost && $model->load($this->request->post())) {
            $model->status = "\u{2714}";
            $model->save();

            $modelLogs = new Logs();   
            $modelLogs->byUserId = Yii::$app->user->id;
            $modelLogs->byUserName = Yii::$app->user->identity->username;
            $modelLogs->description = "Com Id: ".$id."Complete by Engineer";
            $modelLogs->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        

        return $this->render('comppend', [
            'model' => $model,
        ]);
    }


    public function actionPend($id)
    {
        $model = $this->findModel($id);

        // if ($this->request->isPost && $model->load($this->request->post())) {
            $model->status = "❌";
            $model->sent2eng = "0";
            $model->save();
            
            $modelLogs = new Logs();   
            $modelLogs->byUserId = Yii::$app->user->id;
            $modelLogs->byUserName = Yii::$app->user->identity->username;
            $modelLogs->description = "Comp Id: '".$id."' Pending by engineer";
            $modelLogs->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        

        return $this->render('comppend', [
            'model' => $model,
        ]);
    }

    private function compareAttributes($oldAttributes, $newAttributes)
    {
        $changes = [];
        foreach ($newAttributes as $attribute => $newValue) {
            $oldValue = $oldAttributes[$attribute];
            if (is_array($newValue)) {
                // Handle nested arrays
                $nestedChanges = $this->compareAttributes($oldValue, $newValue);
                if (!empty($nestedChanges)) {
                    $changes[] = "<strong>'$attribute'</strong> changes: " . implode("; ", $nestedChanges)." </br>";
                }
            } elseif ($oldValue !== $newValue) {
                // Convert arrays to JSON format for better readability
                $oldValue = is_array($oldValue) ? Json::encode($oldValue) : $oldValue;
                $newValue = is_array($newValue) ? Json::encode($newValue) : $newValue;
                $changes[] = "<strong>'$attribute'</strong> changed from $oldValue to $newValue. </br>";
            }
        }
        return $changes;
    }
    /**
     * Updates an existing UserComplaint model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //     ]);
    // }
    public function actionUpdate($id, $reEditing = 0)
    {
        $model = $this->findModel($id);
        $modelLogs = new Logs();
    
        $modelLogs->byUserId = Yii::$app->user->id;
        $modelLogs->byUserName = Yii::$app->user->identity->username;
    
        if ($reEditing == 1) {
            // Load the old attribute values for the main model
            $oldModelAttributes = $model->oldAttributes;
        }
    
        if ($model->load(Yii::$app->request->post())) {
            if ($reEditing == 1) {
                // Compare old and new attributes for the main model
                $changes = $this->compareAttributes($oldModelAttributes, $model->attributes);
    
                // Create a description of the changes
                $desc = "Updated a passed complaint with id=" . $id . " <br>";
                $desc .= "Main Model Changes: " . implode("; ", $changes) . "<br>";
                $modelLogs->description = $desc;
            }
    
            // Validate the main model
            if ($model->validate()) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($model->save()) {
                        $transaction->commit();
                        $modelLogs->save(false);
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
    
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    /**
     * Deletes an existing UserComplaint model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $modelLogs = new Logs();
        $modelLogs->byUserId = Yii::$app->user->id;
        $modelLogs->byUserName = Yii::$app->user->identity->username;
        $modelLogs->description = "Deleted complaint with id= ".$id."";
        $modelLogs->save(false);
        return $this->redirect(['index']);
    }

    /**
     * Finds the UserComplaint model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return UserComplaint the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserComplaint::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
