<?php

class Lb1_PickUpAtPoint_Block_Adminhtml_Point_Edit_Form
    extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * @inheritDoc
     */
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(
            [
                'id' => 'edit_form',
                'action' => $this->getUrl(
                    'lb1_pickupatpoint_admin/point/edit',
                    [
                        '_current' => true,
                        'continue' => 0,
                    ]
                ),
                'method' => 'post',
            ]
        );
        $form->setUseContainer(true);

        $this->setForm($form);

        $fieldset = $form->addFieldset('general',
            [
                'legend' => $this->__('Point Details')
            ]
        );

        /**
         * @var Lb1_PickUpAtPoint_Model_Point $point
         */
        $point = Mage::getSingleton('lb1_pickupatpoint/point');
        $this->_addFieldsToFieldset($fieldset, [
            'first_name' => [
                'label' => $this->__('First name'),
                'input' => 'text',
                'required' => true,
            ],
            'last_name' => [
                'label' => $this->__('Last name'),
                'input' => 'text',
                'required' => true,
            ],
            'street_name' => [
                'label' => $this->__('Street name'),
                'input' => 'text',
                'required' => true,
            ],
            'street_number' => [
                'label' => $this->__('Street number'),
                'input' => 'text',
                'required' => true,
            ],
            'flat_number' => [
                'label' => $this->__('Flat number'),
                'input' => 'text',
                'required' => false,
            ],
            'city' => [
                'label' => $this->__('City'),
                'input' => 'text',
                'required' => true,
            ],
            'post_code' => [
                'label' => $this->__('Post code'),
                'input' => 'text',
                'required' => true,
            ],
            'phone_number' => [
                'label' => $this->__('Phone number'),
                'input' => 'text',
                'required' => true,
            ],
            'visibility' => [
                'label' => $this->__('Visibility'),
                'input' => 'select',
                'required' => true,
                'options' => $point->getAvailableVisibilities(),
            ],
        ]);

        return $this;
    }

    /**
     * @param Varien_Data_Form_Element_Fieldset $fieldset
     * @param string[] $fields
     * @return $this
     * @throws Exception
     */
    protected function _addFieldsToFieldset(Varien_Data_Form_Element_Fieldset $fieldset, array $fields)
    {
        $requestData = new Varien_Object($this->getRequest()->getPost('pointData'));

        foreach ($fields as $name => $_data) {
            if ($requestValue = $requestData->getData($name)) {
                $_data['value'] = $requestValue;
            }

            if (!array_key_exists('value', $_data)) {
                $_data['value'] = $this->_getPoint()->getData($name);
            }

            $_data['name'] = "pointData[$name]";
            $_data['title'] = $_data['label'];

            $fieldset->addField($name, $_data['input'], $_data);
        }

        return $this;
    }

    /**
     * Return current point
     *
     * @return Lb1_PickUpAtPoint_Model_Point
     */
    protected function _getPoint()
    {
        if (!$this->hasData('point')) {
            $point = Mage::registry('current_point');

            if (!$point instanceof Lb1_PickUpAtPoint_Model_Point) {
                $point = Mage::getModel('lb1_pickupatpoint/point');
            }

            $this->setData('point', $point);
        }

        return $this->getData('point');
    }
}