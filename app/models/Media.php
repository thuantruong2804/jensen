<?php
class Media extends Eloquent {

	protected $table = 'zz_medias';
    protected $primaryKey = 'id';
    
    /**
     * find media by id
     * @author Thuan Truong
     */
    public function findMediaById ($id) {
        return $this->whereRaw('id = ? and is_deleted = ?', array($id, 0))->first();
    }
    
    /**
     * destroy media
     * @author Thuan Truong
     */
    public function deleteMedia($id) {
        $media = $this->findMediaById($id);
        $media->is_deleted = 1;
        $media->update();
    }
    
	/**
	 * Get all videos
	 * Get media which has type = Config::get('config.media_type.video')
	 * 
	 * @author Duc Nguyen
	 */
	public function getVideos() {
		return $this->whereRaw('is_deleted = ? and type = ?', array(0, Config::get('config.media_type.video')))->orderBy('updated_at', 'desc')->get();
	}
    
    /**
     * get list other project
     * @author Thuan Truong
     */
    public function getOtherProject () {
        return $this->whereRaw('is_deleted = ? and type = ? and object_type = ?', array(0, Config::get('config.media_type.image'), 'other_project'))->get(); 
    } 
     
}