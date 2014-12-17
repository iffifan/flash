<?php namespace Laracasts\Flash;

class FlashNotifier {

    /**
     * @var SessionStore
     */
    private $session;

    /**
     * @param SessionStore $session
     */
    function __construct(SessionStore $session)
    {
        $this->session = $session;
    }

    /**
     * @param $message
     * @param $title
     */
    public function info($message)
    {
        $this->message('<i class="fa-fw fa fa-info"></i>'.$message, 'info');
    }

    /**
     * @param $message
     * @param $title
     */
    public function success($message)
    {
        $this->message('<i class="fa-fw fa fa-check"></i>'.$message, 'success');
    }

    /**
     * @param $message
     * @param $title
     */
    public function error($message)
    {
        $this->message('<i class="fa-fw fa fa-times"></i>'.$message, 'danger');
    }

    /**
     * @param $message
     * @param $title
     */
    public function warning($message)
    {
        $this->message('<i class="fa-fw fa fa-warning"></i>'.$message, 'warning');
    }

    /**
     * @param $message
     * @param $title
     */
    public function overlay($message, $title = 'Notice')
    {
        $this->message($message, 'info', $title);
        $this->session->flash('flash_notification.overlay', true);
        $this->session->flash('flash_notification.title', $title);
    }

    /**
     * @param $message
     * @param string $level
     */
    public function message($message, $level = 'info', $title = 'Notice')
    {
        $this->session->flash('flash_notification.message', $message);
        $this->session->flash('flash_notification.level', $level);
    }

}
