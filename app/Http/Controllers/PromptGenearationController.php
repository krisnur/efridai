<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Prompt;
use Illuminate\Support\Facades\Session;

class PromptGenearationController extends Controller
{
    //
    public function generationForm()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Fetch the predefined options for each category from the respective tables
        $features = Criteria::select('category','name')
            ->groupBy('category','name')
            ->get();
        
        $categoris = Criteria::select('category')
            ->groupBy('category')
            ->get();

        // Return the view with the predefined options to display the form
        return view('prompt.generate', compact('features','categoris'));
    }
    public function result(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        //dd('Reached the result method'); // Debugging statement

        $validator = Validator::make($request->all(), [
            'subject' => 'required',
        ]);
        //dd($validator); // Debugging statement
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //dd($request->all()); // Debugging statement
        //$generatedPrompt = $request->all();
        // Get the selected features from the form input
        // $features = $request->input('features');

        // Get the subject from the form input
        $subject = $request->input('subject');
        $aspectRatio = $request->input('Aspect_Ratio');
        $colorAndTone = $request->input('Color_&_Tone');
        $composition = $request->input('Composition');
        $concept = $request->input('Concept');
        $contentType = $request->input('Content_Type');
        $dimension = $request->input('Dimension');
        $effect = $request->input('Effect');
        $habitat = $request->input('Habitat');
        $lighting = $request->input('Lighting');
        $material = $request->input('Material');
        $stylesMovement = $request->input('Styles_Movement');
        $technique = $request->input('Technique');
        $theme = $request->input('Theme');
        // Combine the selected features to generate the AI prompt with commas
        // Generate your AI prompt using the fetched parameters
        $generatedPrompt = "$subject, $aspectRatio, $colorAndTone, $composition, $concept, $contentType, $dimension, $effect, $habitat, $lighting, $material, $stylesMovement, $technique, $theme";
        $generatedPrompt = trim($generatedPrompt, ', None');
        // Return the view with the generated prompt
        return view('prompt.result', compact('generatedPrompt'));
    }
    
    public function savePrompt(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Validate the form data for saving the prompt
        $request->validate([
            'generated_prompt' => 'required|string',
        ]);

        // Get the currently authenticated user (assuming you are using Laravel's built-in authentication)
        $user = Auth::user();

        // Save the prompt to the database using the Prompt model and associate it with the user
        $prompt = new Prompt();
        $prompt->user_id = $user->id; // Associate the prompt with the user ID
        $prompt->content = $request->input('generated_prompt');
        $prompt->format = 'image';
        $prompt->save();

        // Optionally, you can redirect back to the result page with a success message
        return redirect()->route('saved.prompt.index')->with('success', 'Prompt has been successfully saved.');
    }
    public function savedPromptList()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $userID = Auth::id();
        
        $prompts = Prompt::query();
        $prompts = $prompts->where('user_id', $userID);
        $prompts = $prompts->where('is_delete', 0);
        $prompts = $prompts->orderByDesc('created_at');
        //dd($prompts); // Debugging statement
        
        return view('prompt.saved', compact('prompts'));
    }
    public function savedPromptDelete(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        
        //dd($request->all());
        $id = $request->input('id');
        $prompt = Prompt::find($id);
        $prompt->is_delete = 1;
        $prompt->update();

        return redirect()->route('saved.prompt.index')->with('success', 'Prompt has been successfully deleted.');
    }
}
