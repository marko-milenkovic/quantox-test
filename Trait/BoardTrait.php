<?php


trait BoardTrait
{
    public function getBoardInstanceFromType(int $type)
    {
        switch ($type)
        {
            case Board::CSM_ID:
                return new CSM();
            case Board::CSMB_ID:
                return new CSMB();
            default:
                return null;
        }
    }
}