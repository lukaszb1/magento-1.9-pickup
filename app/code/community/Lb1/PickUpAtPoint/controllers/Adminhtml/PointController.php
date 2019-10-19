<?php

class Lb1_PickUpAtPoint_Adminhtml_PointController
    extends Mage_Adminhtml_Controller_Action
{
    /**
     * @inheritDoc
     */
    protected function _isAllowed()
    {
        $actionName = $this->getRequest()->getActionName();

        switch ($actionName) {
            case 'index':
            case 'edit':
            case 'delete':
                // Intentionally no break
            default:
                $adminSession = Mage::getSingleton('admin/session');
                $isAllowed = $adminSession->isAllowed('lb1_pickupatpoint/point');
                break;
        }

        return $isAllowed;
    }

    /**
     * Show grid
     */
    public function indexAction()
    {
        $this->loadLayout();

        $block = $this->getLayout()->createBlock('lb1_pickupatpoint_adminhtml/point');

        $this->_setActiveMenu('pickupatpoint/point');
        $this->_addContent($block);

        $this->renderLayout();
    }

    /**
     * Handle both viewing and adding/editing point
     *
     * @return Lb1_PickUpAtPoint_Adminhtml_PointController|Mage_Core_Controller_Varien_Action
     */
    public function editAction()
    {
        try {
            /**
             * @var Lb1_PickUpAtPoint_Model_Point $point
             */
            $point = Mage::getModel('lb1_pickupatpoint/point');

            if ($id = (int) $this->getRequest()->getParam('id', false)) {
                $point->load($id);

                if (empty($point->getId())) {
                    throw new Mage_Core_Exception('This point does not exists.');
                }
            }

            // Process $_POST data
            if ($postData = $this->getRequest()->getPost('pointData')) {
                $point->addData($postData);
                $point->save();

                $this->_getSession()->addSuccess($this->__('The point has been saved.'));

                return $this->_redirect('lb1_pickupatpoint_admin/point/edit', ['id' => $point->getId()]);
            }

            Mage::register('current_point', $point);

            $block = $this
                ->getLayout()
                ->createBlock('lb1_pickupatpoint_adminhtml/point_edit');

            return $this
                ->loadLayout()
                ->_addContent($block)
                ->renderLayout();
        } catch (Exception $e) {
            Mage::logException($e);

            $this->_getSession()->addError($e->getMessage());
        }

        return $this->_redirect('lb1_pickupatpoint_admin/point/index');
    }


    /**
     * Delete the point
     *
     * @return Lb1_PickUpAtPoint_Adminhtml_PointController|Mage_Core_Controller_Varien_Action
     */
    public function deleteAction()
    {
        try {
            $pointId = (int) $this->getRequest()->getParam('id', false);

            if (!$pointId) {
                throw new Mage_Core_Exception('Invalid data.');
            }

            /**
             * @var Lb1_PickUpAtPoint_Model_Point $point
             */
            $point = Mage::getModel('lb1_pickupatpoint/point')->load($pointId);

            if (!$point->getId()) {
                throw new Mage_Core_Exception('This point does not exists.');
            }

            $point->delete();

            $this->_getSession()->addSuccess($this->__('The point has been deleted.'));
        } catch (Exception $e) {
            Mage::logException($e);

            $this->_getSession()->addError($e->getMessage());
        }

        return $this->_redirect('lb1_pickupatpoint_admin/point/index');
    }
}