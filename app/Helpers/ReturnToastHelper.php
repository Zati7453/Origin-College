<?php

namespace App\Helpers;

use App\Helpers\ResponseHelper;
use Exception;

class ReturnToastHelper {
    public static function Custom($class, $message, $heading=null) {
        return back()->with(
            [
                'SESSION_RETURN' => true,
                'type' => $class,
                'heading' => $heading,
                'message' => $message,
            ]
        );
    }

    public static function Success() {
        return back()->with(
            [
                'SESSION_RETURN' => true,
                'type' => 'success',
                'heading' => 'Done:',
                'message' => 'Record Saved successfully.',
            ]
        );
    }

    public static function Deleted() {
        return back()->with(
            [
                'SESSION_RETURN' => true,
                'type' => 'success',
                'heading' => 'Deleted:',
                'message' => 'Record Deleted successfully.',
            ]
        );
    }

    public static function Failed() {
        return back()->with(
            [
                'SESSION_RETURN' => true,
                'type' => 'danger',
                'heading' => 'Error: ',
                'message' => 'Failed to save record. Please try again later.',
            ]
        );
    }

    public static function DeleteFailed() {
        return back()->with(
            [
                'SESSION_RETURN' => true,
                'type' => 'danger',
                'heading' => 'Error: ',
                'message' => 'Failed to delete record. Please try again later.',
            ]
        );
    }
}