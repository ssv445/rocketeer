<?php
namespace Rocketeer\Console;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

class RocketeerStyle extends SymfonyStyle
{
    /**
     * @var InputInterface
     */
    protected $input;

    /**
     * {@inheritdoc}
     */
    public function __construct(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;

        parent::__construct($input, $output);
    }

    /**
     * {@inheritdoc}
     */
    public function askQuestion(Question $question)
    {
        if (!$this->input->isInteractive()) {
            return $this->writeln('<error>Non-interactive mode, prompt was skipped:</error> '.$question->getQuestion());
        }

        return parent::askQuestion($question);
    }

}
